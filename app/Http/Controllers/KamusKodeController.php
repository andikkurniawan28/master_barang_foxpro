<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamusKodeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Ambil semua data barang_asli untuk referensi
        $barangAsli = DB::table('barang_asli')
            ->select('KD_BRG', 'NAMA_BARU')
            ->get()
            ->keyBy('KD_BRG');

        $data = [];

        $d1 = DB::table('ka')->orderBy('D1')->get();

        foreach ($d1 as $digit1) {
            $data[$digit1->KA] = [
                'd1' => $digit1,
                'd2' => [],
                'barang' => [] // Barang langsung di level D1
            ];

            // Cari barang langsung di level D1 (tanpa child)
            $barangD1 = DB::table('barang_asli')
                ->where('KD_BRG', 'LIKE', $digit1->KA . '%')
                ->whereRaw('LENGTH(KD_BRG) = 3') // Asumsi panjang kode D1 = 1 digit
                ->select('KD_BRG', 'NAMA_BARU')
                ->get();

            foreach ($barangD1 as $barang) {
                $data[$digit1->KA]['barang'][] = [
                    'kd_brg' => $barang->KD_BRG,
                    'nama_baru' => $barang->NAMA_BARU
                ];
            }

            // Ambil D2 untuk D1 ini
            $d2 = DB::table('kb')
                ->where('D2', $digit1->KA)
                ->orderBy('KB')
                ->get();

            foreach ($d2 as $digit2) {
                $data[$digit1->KA]['d2'][$digit2->KB] = [
                    'd2' => $digit2,
                    'd3' => [],
                    'barang' => [] // Barang di level D2
                ];

                // Cek apakah ada barang langsung di level D2 (tanpa child)
                $kodeD2 = $digit1->KA . $digit2->KB;
                $barangD2 = DB::table('barang_asli')
                    ->where('KD_BRG', 'LIKE', $kodeD2 . '%')
                    ->whereRaw('LENGTH(KD_BRG) = 5') // Asumsi panjang kode D2 = 2 digit
                    ->select('KD_BRG', 'NAMA_BARU')
                    ->get();

                foreach ($barangD2 as $barang) {
                    $data[$digit1->KA]['d2'][$digit2->KB]['barang'][] = [
                        'kd_brg' => $barang->KD_BRG,
                        'nama_baru' => $barang->NAMA_BARU
                    ];
                }

                // Ambil D3 untuk D2 ini (D1 + D2)
                $d3 = DB::table('kc')
                    ->where('D3', $digit1->KA . $digit2->KB)
                    ->orderBy('KC')
                    ->get();

                if ($d3->isEmpty()) {
                    // Jika tidak ada D3, cari barang langsung di level D2
                    // Ini sudah dilakukan di atas
                    continue;
                }

                foreach ($d3 as $digit3) {
                    $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC] = [
                        'd3' => $digit3,
                        'd4' => [],
                        'barang' => [] // Barang di level D3
                    ];

                    // Cek apakah ada barang langsung di level D3
                    $kodeD3 = $digit1->KA . $digit2->KB . $digit3->KC;
                    $barangD3 = DB::table('barang_asli')
                        ->where('KD_BRG', 'LIKE', $kodeD3 . '%')
                        // ->whereRaw('LENGTH(KD_BRG) = 7') // Asumsi panjang kode D3 = 3 digit
                        ->select('KD_BRG', 'NAMA_BARU')
                        ->get();

                    foreach ($barangD3 as $barang) {
                        $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC]['barang'][] = [
                            'kd_brg' => $barang->KD_BRG,
                            'nama_baru' => $barang->NAMA_BARU
                        ];
                    }

                    // Ambil D4 untuk D3 ini (D1 + D2 + D3)
                    $d4 = DB::table('kd')
                        ->where('D4', $digit1->KA . $digit2->KB . $digit3->KC)
                        ->orderBy('KD')
                        ->get();

                    if ($d4->isEmpty()) {
                        // Jika tidak ada D4, cari barang langsung di level D3
                        // Ini sudah dilakukan di atas
                        continue;
                    }

                    foreach ($d4 as $digit4) {
                        $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC]['d4'][$digit4->KD] = [
                            'd4' => $digit4,
                            'd5' => [],
                            'barang' => [] // Barang di level D4
                        ];

                        // Cek apakah ada barang langsung di level D4
                        $kodeD4 = $digit1->KA . $digit2->KB . $digit3->KC . $digit4->KD;
                        $barangD4 = DB::table('barang_asli')
                            ->where('KD_BRG', 'LIKE', $kodeD4 . '%')
                            // ->whereRaw('LENGTH(KD_BRG) = 9') // Asumsi panjang kode D4 = 4 digit
                            ->select('KD_BRG', 'NAMA_BARU')
                            ->get();

                        foreach ($barangD4 as $barang) {
                            $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC]['d4'][$digit4->KD]['barang'][] = [
                                'kd_brg' => $barang->KD_BRG,
                                'nama_baru' => $barang->NAMA_BARU
                            ];
                        }

                        // Ambil D5 untuk D4 ini (D1 + D2 + D3 + D4)
                        $d5 = DB::table('ke')
                            ->where('D5', $digit1->KA . $digit2->KB . $digit3->KC . $digit4->KD)
                            ->orderBy('KE')
                            ->get();

                        if ($d5->isEmpty()) {
                            // Jika tidak ada D5, cari barang langsung di level D4
                            // Ini sudah dilakukan di atas
                            continue;
                        }

                        foreach ($d5 as $digit5) {
                            $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC]['d4'][$digit4->KD]['d5'][$digit5->KE] = [
                                'd5' => $digit5,
                                'barang' => [] // Barang di level D5
                            ];

                            // Cari barang di level D5 (paling dalam)
                            $kodeD5 = $digit1->KA . $digit2->KB . $digit3->KC . $digit4->KD . $digit5->KE;
                            $barangD5 = DB::table('barang_asli')
                                ->where('KD_BRG', 'LIKE', $kodeD5 . '%')
                                // ->whereRaw('LENGTH(KD_BRG) = 11') // Asumsi panjang total = 5 digit + 2 digit D5?
                                ->select('KD_BRG', 'NAMA_BARU')
                                ->get();

                            foreach ($barangD5 as $barang) {
                                $data[$digit1->KA]['d2'][$digit2->KB]['d3'][$digit3->KC]['d4'][$digit4->KD]['d5'][$digit5->KE]['barang'][] = [
                                    'kd_brg' => $barang->KD_BRG,
                                    'nama_baru' => $barang->NAMA_BARU
                                ];
                            }
                        }
                    }
                }
            }
        }

        // Return data untuk debugging
        // return response()->json($data);
        return view('kamus_kode', compact('data'));
    }
}
