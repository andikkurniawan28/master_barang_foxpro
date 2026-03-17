<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahBarangController extends Controller
{
    public function index()
    {
        $ka_data = DB::table('ka')->get();
        return view('tambah_barang', compact('ka_data'));
    }

    public function process(Request $request)
    {

        // 1. Cek apakah KD_BRG sudah digunakan oleh record lain
        $cek = DB::table('barang_asli')
            ->where('KD_BRG', $request->KD_BRG)
            ->where('ID', '!=', $request->ID) // pastikan bukan dirinya sendiri
            ->exists();

        if ($cek) {
            return redirect()->back()->with('error', 'Kode tersebut sudah digunakan');
        }

        // 2. Buat ID
        // $id = $this->generateNextBarangId();

        // Ambil data KA berdasarkan D1, hanya 1 row
        $ka = DB::table('ka')->where('KA', $request->D1)->get()->last();
        $kb = DB::table('kb')->where('KB', $request->D2)->where('D2', substr($request->KD_BRG, 0, 1))->get()->last();
        $kc = DB::table('kc')->where('KC', $request->D3)->where('D3', substr($request->KD_BRG, 0, 2))->get()->last();
        $kd = DB::table('kd')->where('KD', $request->D4)->where('D4', substr($request->KD_BRG, 0, 3))->get()->last();
        $ke = DB::table('ke')->where('KE', $request->D5)->where('D5', substr($request->KD_BRG, 0, 4))->get()->last();

        $d1sampaid5 = substr($request->KD_BRG, 0, 5);

        $d6 = DB::table('d6')->where('D6', $request->D6_value)->where('D5', $d1sampaid5)->get()->last();
        $d8 = DB::table('d8')->where('D8', $request->D8_value)->where('D5', $d1sampaid5)->get()->last();
        $d10 = DB::table('d10')->where('D10', $request->D10_value)->where('D5', $d1sampaid5)->get()->last();
        $d12 = DB::table('d12')->where('D12', $request->D12_value)->where('D5', $d1sampaid5)->get()->last();
        $d14 = DB::table('d14')->where('D14', $request->D14_value)->where('D5', $d1sampaid5)->get()->last();
        $d16 = DB::table('d16')->where('D16', $request->D16_value)->where('D5', $d1sampaid5)->get()->last();
        $d18 = DB::table('d18')->where('D18', $request->D18_value)->where('D5', $d1sampaid5)->get()->last();
        $d20 = DB::table('d20')->where('D20', $request->D20_value)->where('D5', $d1sampaid5)->get()->last();
        $d22 = DB::table('d22')->where('D22', $request->D22_value)->where('D5', $d1sampaid5)->get()->last();
        $d24 = DB::table('d24')->where('D24', $request->D24_value)->where('D5', $d1sampaid5)->get()->last();

        $request->request->add([
            // 'ID' => $id,
            'D1_true' => $ka->KA ?? null,
            'K1_true' => $ka->KET ?? null,
            'D2_true' => $kb->KB ?? null,
            'K2_true' => $kb->KET ?? null,
            'D3_true' => $kc->KC ?? null,
            'K3_true' => $kc->KET ?? null,
            'D4_true' => $kd->KD ?? null,
            'K4_true' => $kd->KET ?? null,
            'D5_true' => $ke->KE ?? null,
            'K5_true' => $ke->KET ?? null,
            'd1sampaid5' => $d1sampaid5,
            'K6' => ($d6->KET ?? '') . ' - ' . ($d6->NILAI ?? ''),
            'K8' => ($d8->KET ?? '') . ' - ' . ($d8->NILAI ?? ''),
            'K10' => ($d10->KET ?? '') . ' - ' . ($d10->NILAI ?? ''),
            'K12' => ($d12->KET ?? '') . ' - ' . ($d12->NILAI ?? ''),
            'K14' => ($d14->KET ?? '') . ' - ' . ($d14->NILAI ?? ''),
            'K16' => ($d16->KET ?? '') . ' - ' . ($d16->NILAI ?? ''),
            'K18' => ($d18->KET ?? '') . ' - ' . ($d18->NILAI ?? ''),
            'K20' => ($d20->KET ?? '') . ' - ' . ($d20->NILAI ?? ''),
            'K22' => ($d22->KET ?? '') . ' - ' . ($d22->NILAI ?? ''),
            'K24' => ($d24->KET ?? '') . ' - ' . ($d24->NILAI ?? ''),
        ]);

        // return $request;

        $simpan = DB::table('barang_asli')
            ->insert([
                'ID' => $request->ID,
                'KD_BRG' => $request->KD_BRG,
                'DISKRIPSI_BARU' => $request->DISKRIPSI_BARU,
                'NM_BRG' => $request->NM_BRG,
                'NAMA_BARU' => $request->NAMA_BARU,
                'NM_ALIAS' => $request->NM_ALIAS,
                'D1' => $request->D1_true,
                'K1' => $request->K1_true,
                'D2' => $request->D2_true,
                'K2' => $request->K2_true,
                'D3' => $request->D3_true,
                'K3' => $request->K3_true,
                'D4' => $request->D4_true,
                'K4' => $request->K4_true,
                'D5' => $request->D5_true,
                'K5' => $request->K5_true,
                'D6' => $request->D6_value ?? '00',
                'K6' => $request->K6 ?? null,
                'D8' => $request->D8_value ?? '00',
                'K8' => $request->K8 ?? null,
                'D10' => $request->D10_value ?? '00',
                'K10' => $request->K10 ?? null,
                'D12' => $request->D12_value ?? '00',
                'K12' => $request->K12 ?? null,
                'D14' => $request->D14_value ?? '00',
                'K14' => $request->K14 ?? null,
                'D16' => $request->D16_value ?? '00',
                'K16' => $request->K16 ?? null,
                'D18' => $request->D18_value ?? '00',
                'K18' => $request->K18 ?? null,
                'D20' => $request->D20_value ?? '00',
                'K20' => $request->K20 ?? null,
                'D22' => $request->D22_value ?? '00',
                'K22' => $request->K22 ?? null,
                'D24' => $request->D24_value ?? '00',
                'K24' => $request->K24 ?? null,
            ]);

        return redirect()->route('barang_sudah_diperbarui')->with('success', "Data berhasil ditambah");
    }

    private function generateNextBarangId()
    {
        // 1. Ambil ID terbesar dari database
        $maxId = DB::table('barang_asli')
            ->select('ID')
            ->where('ID', 'like', '__export__.product_product_%')
            ->orderByRaw("CAST(SUBSTRING(ID, LENGTH('__export__.product_product_') + 1) AS UNSIGNED) DESC")
            ->first();

        // 2. Jika tidak ditemukan, mulai dari angka pertama
        if (!$maxId) {
            return "__export__.product_product_1";
        }

        // 3. Ambil angka dari ID
        $prefix = "__export__.product_product_";
        $currentNumber = (int) str_replace($prefix, '', $maxId->ID);

        // 4. Increment
        $nextNumber = $currentNumber + 1;

        // 5. Kembalikan ID baru
        return $prefix . $nextNumber;
    }
}
