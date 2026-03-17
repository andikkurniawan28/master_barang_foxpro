<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD8Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d8 = DB::table('d8')->where('D5', $d5)->where('KET', $keterangan)->get(['D8', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd8' => $d8,
        ];

        // Jika semua kosong, kembalikan null
        if ($d8->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
