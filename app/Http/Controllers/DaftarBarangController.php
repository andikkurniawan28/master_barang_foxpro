<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class DaftarBarangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table(DB::raw('(SELECT ID, NAMA, KDBRG FROM barang_asli) AS b'));
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $buttons = '<div class="btn-group" role="group">';
                        $editUrl = route('perbarui_barang.index', $row->ID);
                        $buttons .= '<a href="' . $editUrl . '" class="btn btn-sm btn-success"><i class="bi bi-arrow-repeat"></i> Perbarui</a>';
                    $buttons .= '</div>';
                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('daftar_barang');
    }
}
