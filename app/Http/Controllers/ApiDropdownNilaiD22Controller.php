<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD22Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d22 = DB::table('d22')->where('D5', $d5)->where('KET', $keterangan)->get(['D22', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd22' => $d22,
        ];

        // Jika semua kosong, kembalikan null
        if ($d22->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
