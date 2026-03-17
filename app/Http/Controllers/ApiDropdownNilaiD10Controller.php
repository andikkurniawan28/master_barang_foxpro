<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD10Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d10 = DB::table('d10')->where('D5', $d5)->where('KET', $keterangan)->get(['D10', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd10' => $d10,
        ];

        // Jika semua kosong, kembalikan null
        if ($d10->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
