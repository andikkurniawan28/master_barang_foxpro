<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD12Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d12 = DB::table('d12')->where('D5', $d5)->where('KET', $keterangan)->get(['D12', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd12' => $d12,
        ];

        // Jika semua kosong, kembalikan null
        if ($d12->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
