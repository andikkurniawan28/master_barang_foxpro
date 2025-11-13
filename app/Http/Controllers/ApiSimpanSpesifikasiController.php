<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSimpanSpesifikasiController extends Controller
{
    private function tentukanUrutanSelanjutnya($max)
    {
        // Jika belum ada data sama sekali
        if (!$max) {
            return '01';
        }

        // Buat daftar karakter valid
        $chars = array_merge(range('0', '9'), range('A', 'Z')); // [0..9, A..Z]
        $max = strtoupper($max);

        // Pecah dua digit
        $first = $max[0];
        $second = $max[1];

        // Cari index di array karakter
        $i1 = array_search($first, $chars);
        $i2 = array_search($second, $chars);

        // Jika index kedua belum mencapai akhir, increment bagian kedua
        if ($i2 < count($chars) - 1) {
            $i2++;
        } else {
            // Jika sudah Z, reset jadi 0 dan increment bagian pertama
            $i2 = 0;
            $i1++;
        }

        // Jika i1 melebihi batas (ZZ), kembalikan ZZ
        if ($i1 >= count($chars)) {
            return 'ZZ';
        }

        // Hasil akhir
        return $chars[$i1] . $chars[$i2];
    }

    public function simpanD6(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d6')->where('D5', $d5)->get();

        $maxD6 = $data->max('D6');

        $nextD6 = $this->tentukanUrutanSelanjutnya($maxD6);

        DB::table('d6')->insert([
            'D5' => $d5,
            'D6' => $nextD6,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D6 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D6' => $nextD6,
                'KET' => $request->keterangan,
            ],
            'maxD6' => $maxD6,
            'nextD6' => $nextD6,
        ]);
    }



    public function simpanD8(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d8')->where('D5', $d5)->get();

        $maxD8 = $data->max('D8');

        $nextD8 = $this->tentukanUrutanSelanjutnya($maxD8);

        DB::table('d8')->insert([
            'D5' => $d5,
            'D8' => $nextD8,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D8 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D8' => $nextD8,
                'KET' => $request->keterangan,
            ],
            'maxD8' => $maxD8,
            'nextD8' => $nextD8,
        ]);
    }



    public function simpanD10(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d10')->where('D5', $d5)->get();

        $maxD10 = $data->max('D10');

        $nextD10 = $this->tentukanUrutanSelanjutnya($maxD10);

        DB::table('d10')->insert([
            'D5' => $d5,
            'D10' => $nextD10,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D10 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D10' => $nextD10,
                'KET' => $request->keterangan,
            ],
            'maxD10' => $maxD10,
            'nextD10' => $nextD10,
        ]);
    }

    public function simpanD12(Request $request)
    {
        // DB::table('d12')->where('ID', $id)
    }
}
