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
        $barang = DB::table('barang_asli')->where('ID', $id)->get()->last();
        return view('detail_barang', compact('barang'));
    }
}
