<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiDropdownD6Controller extends Controller
{
    public function __invoke($d5)
    {
        // Ambil data dari tiga tabel
        // $d6 = DB::table('d6')->where('D5', $d5)->get(['D6', 'KET', 'NILAI']);
        // $d8 = DB::table('d8')->where('D5', $d5)->get(['D8', 'KET', 'NILAI']);
        // $d10 = DB::table('d10')->where('D5', $d5)->get(['D10', 'KET', 'NILAI']);
        // $d12 = DB::table('d12')->where('D5', $d5)->get(['D12', 'KET', 'NILAI']);
        // $d14 = DB::table('d14')->where('D5', $d5)->get(['D14', 'KET', 'NILAI']);
        // $d16 = DB::table('d16')->where('D5', $d5)->get(['D16', 'KET', 'NILAI']);
        // $d18 = DB::table('d18')->where('D5', $d5)->get(['D18', 'KET', 'NILAI']);
        // $d20 = DB::table('d20')->where('D5', $d5)->get(['D20', 'KET', 'NILAI']);
        // $d22 = DB::table('d22')->where('D5', $d5)->get(['D22', 'KET', 'NILAI']);
        // $d24 = DB::table('d24')->where('D5', $d5)->get(['D24', 'KET', 'NILAI']);

        $d6 = DB::table('d6')
            ->where('D5', $d5)
            ->orderBy('D6')
            ->get()
            ->unique('KET')
            ->values();

        $d8 = DB::table('d8')
            ->where('D5', $d5)
            ->orderBy('D8')
            ->get()
            ->unique('KET')
            ->values();

        $d10 = DB::table('d10')
            ->where('D5', $d5)
            ->orderBy('D10')
            ->get()
            ->unique('KET')
            ->values();

        $d12 = DB::table('d12')
            ->where('D5', $d5)
            ->orderBy('D12')
            ->get()
            ->unique('KET')
            ->values();

        $d14 = DB::table('d14')
            ->where('D5', $d5)
            ->orderBy('D14')
            ->get()
            ->unique('KET')
            ->values();

        $d16 = DB::table('d16')
            ->where('D5', $d5)
            ->orderBy('D16')
            ->get()
            ->unique('KET')
            ->values();

        $d18 = DB::table('d18')
            ->where('D5', $d5)
            ->orderBy('D18')
            ->get()
            ->unique('KET')
            ->values();

        $d20 = DB::table('d20')
            ->where('D5', $d5)
            ->orderBy('D20')
            ->get()
            ->unique('KET')
            ->values();

        $d22 = DB::table('d22')
            ->where('D5', $d5)
            ->orderBy('D22')
            ->get()
            ->unique('KET')
            ->values();

        $d24 = DB::table('d24')
            ->where('D5', $d5)
            ->orderBy('D24')
            ->get()
            ->unique('KET')
            ->values();

        // Gabungkan hasil jadi satu array respons
        $data = [
            'd6' => $d6,
            'd8' => $d8,
            'd10' => $d10,
            'd12' => $d12,
            'd14' => $d14,
            'd16' => $d16,
            'd18' => $d18,
            'd20' => $d20,
            'd22' => $d22,
            'd24' => $d24,
        ];

        // Jika semua kosong, kembalikan null
        // if ($d6->isEmpty() && $d8->isEmpty() && $d10->isEmpty()) {
        //     return response()->json(null);
        // }

        // Jika semua kosong, kembalikan null
        if ($d6->isEmpty() && $d8->isEmpty() && $d10->isEmpty() &&
            $d12->isEmpty() && $d14->isEmpty() && $d16->isEmpty() &&
            $d18->isEmpty() && $d20->isEmpty() && $d22->isEmpty() &&
            $d24->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($data);
    }
}
