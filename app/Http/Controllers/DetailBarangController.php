<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBarangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $barang = DB::table('barang_asli')->where('ID', $id)->first();

        $k1 = DB::table('ka')
            ->where('KA', $barang->D1)
            ->where('D1', substr($barang->KD_BRG,0,1))
            ->first();

        $k2 = DB::table('kb')
            ->where('KB', $barang->D2)
            ->where('D2', substr($barang->KD_BRG,0,1))
            ->first();

        $k3 = DB::table('kc')
            ->where('KC', $barang->D3)
            ->where('D3', substr($barang->KD_BRG,0,2))
            ->first();

        $k4 = DB::table('kd')
            ->where('KD', $barang->D4)
            ->where('D4', substr($barang->KD_BRG,0,3))
            ->first();

        $k5 = DB::table('ke')
            ->where('KE', $barang->D5)
            ->where('D5', substr($barang->KD_BRG,0,4))
            ->first();

        $k6 = DB::table('d6')
            ->where('D6', $barang->D6)
            ->where('D5', substr($barang->KD_BRG,0,5))
            ->first();

        $k8 = DB::table('d8')
            ->where('D8', $barang->D8)
            ->where('D5', substr($barang->KD_BRG,0,5))
            ->first();

        $k10 = DB::table('d10')
            ->where('D10', $barang->D10)
            ->where('D5', substr($barang->KD_BRG,0,5))
            ->first();

        // return substr($barang->KD_BRG,0,5);

        // return $barang;

        return view('detail_barang', compact('barang', 'k1', 'k2', 'k3', 'k4', 'k5', 'k6', 'k8', 'k10'));
    }
}
