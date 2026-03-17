<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD6Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d6 = DB::table('d6')->where('D5', $d5)->where('KET', $keterangan)->get(['D6', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd6' => $d6,
        ];

        // Jika semua kosong, kembalikan null
        if ($d6->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
