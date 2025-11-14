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

        $d1sampaid5 = substr($barang->KD_BRG, 0, 5) ?? '00000';

        $ka_data = DB::table('ka')->get();

        // ================
        // D1 → D2 (KA → KB)
        // ================
        $d1_prefix = DB::table('ka')
            ->where('KA', $barang->D1)
            ->value('D1');

        $kb_data = [];
        if ($d1_prefix) {
            $kb_data = DB::table('kb')
                ->where('D2', 'like', $d1_prefix . '%')
                ->get();
        }


        // ================
        // D2 → D3 (KB → KC)
        // ================
        $d2_prefix = DB::table('kb')
            ->where('KB', $barang->D2)
            ->where('KET', $barang->K2)
            ->value('D2');

        $kc_data = [];
        if ($d2_prefix) {
            $kc_data = DB::table('kc')
                ->where('D3', 'like', $d2_prefix . '%')
                ->get();
        }


        // ================
        // D3 → D4 (KC → KD)
        // ================
        $d3_prefix = DB::table('kc')
            ->where('KC', $barang->D3)
            ->where('KET', $barang->K3)
            ->value('D3');

        $kd_data = [];
        if ($d3_prefix) {
            $kd_data = DB::table('kd')
                ->where('D4', 'like', $d3_prefix . '%')
                ->get();
        }


        // ================
        // D4 → D5 (KD → KE)
        // ================
        $d4_prefix = DB::table('kd')
            ->where('KD', $barang->D4)
            ->where('KET', $barang->K4)
            ->value('D4');

        $ke_data = [];
        if ($d4_prefix) {
            $ke_data = DB::table('ke')
                ->where('D5', 'like', $d4_prefix . '%')
                ->get();
        }

        $d6_data = DB::table('d6')->where('D5', $d1sampaid5)->get();
        $d8_data = DB::table('d8')->where('D5', $d1sampaid5)->get();
        $d10_data = DB::table('d10')->where('D5', $d1sampaid5)->get();
        $d12_data = DB::table('d12')->where('D5', $d1sampaid5)->get();

        return view('perbarui_barang', compact(
            'barang',
            'ka_data',
            'kb_data',
            'kc_data',
            'kd_data',
            'ke_data',
            'd6_data',
            'd8_data',
            'd10_data',
            'd12_data',
            'id',
            'd1sampaid5',
        ));
    }

    public function process(Request $request)
    {
        // 1. Cek apakah KD_BRG sudah digunakan oleh record lain
        $cek = DB::table('barang_asli')
            ->where('KD_BRG', $request->KD_BRG)
            ->where('ID', '!=', $request->ID) // pastikan bukan dirinya sendiri
            ->exists();

        if ($cek) {
            return redirect()->back()->with('error', 'Kode tersebut sudah digunakan');
        }

        // Ambil data KA berdasarkan D1, hanya 1 row
        $ka = DB::table('ka')->where('D1', $request->D1)->get()->last();
        $kb = DB::table('kb')->where('D2', $request->D2)->get()->last();
        $kc = DB::table('kc')->where('D3', $request->D3)->get()->last();
        $kd = DB::table('kd')->where('D4', $request->D4)->get()->last();
        $ke = DB::table('ke')->where('D5', $request->D5)->get()->last();

        $d1sampaid5 = substr($request->KD_BRG, 0, 5);

        $d6 = DB::table('d6')->where('D6', $request->D6)->where('D5', $d1sampaid5)->get()->last();
        $d8 = DB::table('d8')->where('D8', $request->D8)->where('D5', $d1sampaid5)->get()->last();
        $d10 = DB::table('d10')->where('D10', $request->D10)->where('D5', $d1sampaid5)->get()->last();
        $d12 = DB::table('d12')->where('D12', $request->D12)->where('D5', $d1sampaid5)->get()->last();

        $request->request->add([
            'D1_true' => $ka->KA ?? null,
            'K1_true' => $ka->KET ?? null,
            'D2_true' => $kb->KB ?? null,
            'K2_true' => $kb->KET ?? null,
            'D3_true' => $kc->KC ?? null,
            'K3_true' => $kc->KET ?? null,
            'D4_true' => $kd->KD ?? null,
            'K4_true' => $kd->KET ?? null,
            'D5_true' => $ke->KE ?? null,
            'K5_true' => $ke->KET ?? null,
            'd1sampaid5' => $d1sampaid5,
            'K6' => $d6->KET ?? null,
            'K8' => $d8->KET ?? null,
            'K10' => $d10->KET ?? null,
            'K12' => $d12->KET ?? null,
        ]);

        $simpan = DB::table('barang_asli')->where('ID', $request->id)
            ->update([
                'KD_BRG' => $request->KD_BRG,
                'DISKRIPSI_BARU' => $request->DISKRIPSI_BARU,
                'NM_BRG' => $request->NM_BRG,
                'NAMA_BARU' => $request->NAMA_BARU,
                'NM_ALIAS' => $request->NM_ALIAS,
                'D1' => $request->D1_true,
                'K1' => $request->K1_true,
                'D2' => $request->D2_true,
                'K2' => $request->K2_true,
                'D3' => $request->D3_true,
                'K3' => $request->K3_true,
                'D4' => $request->D4_true,
                'K4' => $request->K4_true,
                'D5' => $request->D5_true,
                'K5' => $request->K5_true,
                'D6' => $request->D6,
                'K6' => $request->K6,
                'D8' => $request->D8,
                'K8' => $request->K8,
                'D10' => $request->D10,
                'K10' => $request->K10,
                'D12' => $request->D12,
                'K12' => $request->K12,
            ]);

        return redirect()->route('barang_sudah_diperbarui')->with('success', "Data berhasil diperbarui");
    }
}
