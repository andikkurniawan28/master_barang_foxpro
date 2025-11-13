<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownD6Controller extends Controller
{
    public function __invoke($d5)
    {
        // Ambil data dari tiga tabel
        $d6 = DB::table('d6')->where('D5', $d5)->get(['D6', 'KET']);
        $d8 = DB::table('d8')->where('D5', $d5)->get(['D8', 'KET']);
        $d10 = DB::table('d10')->where('D5', $d5)->get(['D10', 'KET']);

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd6' => $d6,
            'd8' => $d8,
            'd10' => $d10,
        ];

        // Jika semua kosong, kembalikan null
        if ($d6->isEmpty() && $d8->isEmpty() && $d10->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
