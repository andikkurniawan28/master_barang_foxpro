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

        $max = str_pad($max, 2, '0', STR_PAD_LEFT);

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

    private function tentukanUrutanSelanjutnya1Digit($max)
    {
        // Jika belum ada data
        if (!$max) {
            return '1';
        }

        $max = strtoupper($max);

        // Jika masih angka 1-8
        if (is_numeric($max) && $max < 9) {
            return (string)($max + 1);
        }

        // Jika 9 maka lanjut ke Z
        if ($max == '9') {
            return 'Z';
        }

        // Jika huruf
        if (ctype_alpha($max)) {
            if ($max == 'A') {
                return 'A'; // mentok
            }

            // Mundur satu huruf
            return chr(ord($max) - 1);
        }

        return '1';
    }

    private function nextOneDigit($max)
    {
        // Jika belum ada data → mulai dari '0'
        if (!$max || trim($max) === '') {
            return '1';
        }

        // Daftar karakter valid (36 karakter)
        $chars = array_merge(range('0', '9'), range('A', 'Z')); // [0-9, A-Z]

        $max = strtoupper($max);

        // Cari posisi karakter saat ini
        $index = array_search($max, $chars);

        // Jika karakter tidak ditemukan, reset ke 0
        if ($index === false) {
            return '0';
        }

        // Jika belum mencapai karakter terakhir → increment
        if ($index < count($chars) - 1) {
            return $chars[$index + 1];
        }

        // Jika sudah Z → kembalikan Z (mentok)
        return 'Z';
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
        $request->validate([
            'd5' => 'required|string|max:12',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d12')->where('D5', $d5)->get();

        $maxD12 = $data->max('D12');

        $nextD12 = $this->tentukanUrutanSelanjutnya($maxD12);

        DB::table('d12')->insert([
            'D5' => $d5,
            'D12' => $nextD12,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D12 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D12' => $nextD12,
                'KET' => $request->keterangan,
            ],
            'maxD12' => $maxD12,
            'nextD12' => $nextD12,
        ]);
    }

    public function simpanD2(Request $request)
    {
        $request->validate([
            'd1' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:211',
        ]);

        $d1 = $request->d1;

        $data = DB::table('kb')->where('D2', $d1)->get();

        $maxD2 = $data->max('KB');

        $nextD2 = $this->tentukanUrutanSelanjutnya1Digit($maxD2);

        DB::table('kb')->insert([
            'D2' => $d1,
            'KB' => $nextD2,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D2 berhasil disimpan.',
            'data' => [
                'D2' => $d1,
                'KB' => $nextD2,
                'KET' => $request->keterangan,
            ],
            'maxD2' => $maxD2,
            'nextD2' => $nextD2,
        ]);
    }

    public function simpanD3(Request $request)
    {
        $request->validate([
            'd2' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:211',
        ]);

        $d2 = $request->d2;

        $data = DB::table('kc')->where('D3', $d2)->get();

        $maxD3 = $data->max('KC');

        $nextD3 = $this->tentukanUrutanSelanjutnya1Digit($maxD3);

        DB::table('kc')->insert([
            'D3' => $d2,
            'KC' => $nextD3,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D3 berhasil disimpan.',
            'data' => [
                'D3' => $d2,
                'KC' => $nextD3,
                'KET' => $request->keterangan,
            ],
            'maxD3' => $maxD3,
            'nextD3' => $nextD3,
        ]);
    }

    public function simpanD4(Request $request)
    {
        $request->validate([
            'd3' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:211',
        ]);

        $d3 = $request->d3;

        $data = DB::table('kd')->where('D4', $d3)->get();

        $maxD4 = $data->max('KD');

        $nextD4 = $this->tentukanUrutanSelanjutnya1Digit($maxD4);

        DB::table('kd')->insert([
            'D4' => $d3,
            'KD' => $nextD4,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D4 berhasil disimpan.',
            'data' => [
                'D4' => $d3,
                'KD' => $nextD4,
                'KET' => $request->keterangan,
            ],
            'maxD4' => $maxD4,
            'nextD4' => $nextD4,
        ]);
    }

    public function simpanD5(Request $request)
    {
        $request->validate([
            'd4' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:211',
        ]);

        $d4 = $request->d4;

        $data = DB::table('ke')->where('D5', $d4)->get();

        $maxD5 = $data->max('KE');

        $nextD5 = $this->tentukanUrutanSelanjutnya1Digit($maxD5);

        DB::table('ke')->insert([
            'D5' => $d4,
            'KE' => $nextD5,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D5 berhasil disimpan.',
            'data' => [
                'D5' => $d4,
                'KE' => $nextD5,
                'KET' => $request->keterangan,
            ],
            'maxD5' => $maxD5,
            'nextD5' => $nextD5,
        ]);
    }

    public function simpanD14(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d14')->where('D5', $d5)->get();

        $maxD14 = $data->max('D14');

        $nextD14 = $this->tentukanUrutanSelanjutnya($maxD14);

        DB::table('d14')->insert([
            'D5' => $d5,
            'D14' => $nextD14,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D14 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D14' => $nextD14,
                'KET' => $request->keterangan,
            ],
            'maxD14' => $maxD14,
            'nextD14' => $nextD14,
        ]);
    }

    public function simpanD16(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d16')->where('D5', $d5)->get();

        $maxD16 = $data->max('D16');

        $nextD16 = $this->tentukanUrutanSelanjutnya($maxD16);

        DB::table('d16')->insert([
            'D5' => $d5,
            'D16' => $nextD16,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D16 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D16' => $nextD16,
                'KET' => $request->keterangan,
            ],
            'maxD16' => $maxD16,
            'nextD16' => $nextD16,
        ]);
    }

    public function simpanD18(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d18')->where('D5', $d5)->get();

        $maxD18 = $data->max('D18');

        $nextD18 = $this->tentukanUrutanSelanjutnya($maxD18);

        DB::table('d18')->insert([
            'D5' => $d5,
            'D18' => $nextD18,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D18 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D18' => $nextD18,
                'KET' => $request->keterangan,
            ],
            'maxD18' => $maxD18,
            'nextD18' => $nextD18,
        ]);
    }

    public function simpanD20(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d20')->where('D5', $d5)->get();

        $maxD20 = $data->max('D20');

        $nextD20 = $this->tentukanUrutanSelanjutnya($maxD20);

        DB::table('d20')->insert([
            'D5' => $d5,
            'D20' => $nextD20,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D20 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D20' => $nextD20,
                'KET' => $request->keterangan,
            ],
            'maxD20' => $maxD20,
            'nextD20' => $nextD20,
        ]);
    }

    public function simpanD22(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d22')->where('D5', $d5)->get();

        $maxD22 = $data->max('D22');

        $nextD22 = $this->tentukanUrutanSelanjutnya($maxD22);

        DB::table('d22')->insert([
            'D5' => $d5,
            'D22' => $nextD22,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D22 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D22' => $nextD22,
                'KET' => $request->keterangan,
            ],
            'maxD22' => $maxD22,
            'nextD22' => $nextD22,
        ]);
    }

    public function simpanD24(Request $request)
    {
        $request->validate([
            'd5' => 'required|string|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $d5 = $request->d5;

        $data = DB::table('d24')->where('D5', $d5)->get();

        $maxD24 = $data->max('D24');

        $nextD24 = $this->tentukanUrutanSelanjutnya($maxD24);

        DB::table('d24')->insert([
            'D5' => $d5,
            'D24' => $nextD24,
            'KET' => $request->keterangan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data D24 berhasil disimpan.',
            'data' => [
                'D5' => $d5,
                'D24' => $nextD24,
                'KET' => $request->keterangan,
            ],
            'maxD24' => $maxD24,
            'nextD24' => $nextD24,
        ]);
    }

}
