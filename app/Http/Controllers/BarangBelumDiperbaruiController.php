<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class BarangBelumDiperbaruiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('barang_asli')
                ->select('ID', 'DEFAULT_CO', 'NAMA', 'DISKRIPSI')
                ->whereNull('KD_BRG')
                ->get();
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

        return view('barang_belum_diperbarui');
    }
}
