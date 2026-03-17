<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD14Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d14 = DB::table('d14')->where('D5', $d5)->where('KET', $keterangan)->get(['D14', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd14' => $d14,
        ];

        // Jika semua kosong, kembalikan null
        if ($d14->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
