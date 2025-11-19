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
            $data = DB::table(DB::raw('(SELECT ID, NAMA, KDBRG, KD_BRG, NAMA_BARU, KET FROM barang_asli) AS b'));
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $buttons = '<div class="btn-group" role="group">';
                        $editUrl = route('perbarui_barang.index', $row->ID);
                        $buttons .= '<a href="' . $editUrl . '" class="btn btn-sm btn-success"><i class="bi bi-arrow-repeat"></i> Perbarui</a>';
                        $detailUrl = route('detail_barang', $row->ID);
                        $buttons .= '<a href="' . $detailUrl . '" class="btn btn-sm btn-info"><i class="bi bi-info"></i> Detail</a>';
                    $buttons .= '</div>';
                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('daftar_barang');
    }
}
