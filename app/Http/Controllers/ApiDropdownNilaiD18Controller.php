<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD18Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d18 = DB::table('d18')->where('D5', $d5)->where('KET', $keterangan)->get(['D18', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd18' => $d18,
        ];

        // Jika semua kosong, kembalikan null
        if ($d18->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
