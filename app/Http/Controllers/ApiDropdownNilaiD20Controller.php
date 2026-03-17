<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownNilaiD20Controller extends Controller
{
    public function __invoke($d5, $keterangan)
    {
        // Ambil data dari tiga tabel
        $d20 = DB::table('d20')->where('D5', $d5)->where('KET', $keterangan)->get(['D20', 'NILAI']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd20' => $d20,
        ];

        // Jika semua kosong, kembalikan null
        if ($d20->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
