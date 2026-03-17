<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD16Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d16 = DB::table('d16')->where('D5', $d5)->where('KET', $keterangan)->get(['D16', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd16' => $d16,
        ];

        // Jika semua kosong, kembalikan null
        if ($d16->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
