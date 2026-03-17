<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD24Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d24 = DB::table('d24')->where('D5', $d5)->where('KET', $keterangan)->get(['D24', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd24' => $d24,
        ];

        // Jika semua kosong, kembalikan null
        if ($d24->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
