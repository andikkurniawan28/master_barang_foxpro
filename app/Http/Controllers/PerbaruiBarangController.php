<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerbaruiBarangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index($id)
    {
        $barang = DB::table('barang_asli')->where('ID', $id)->get()->last();
        $ka_data = DB::table('ka')->get();
        $d6_data = DB::table('d6')->get();
        $d8_data = DB::table('d8')->get();
        $d10_data = DB::table('d10')->get();
        $d12_data = DB::table('d12')->get();
        return view('perbarui_barang', compact('barang', 'ka_data', 'd6_data', 'd8_data', 'd10_data', 'd12_data', 'id'));
    }

    public function process(Request $request)
    {
        //
    }
}
