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

        $d1sampaid2 = substr($barang->KD_BRG, 0, 2) ?? '00';
        $d1sampaid3 = substr($barang->KD_BRG, 0, 3) ?? '000';
        $d1sampaid4 = substr($barang->KD_BRG, 0, 4) ?? '0000';
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
                ->where('D2', $d1_prefix)
                ->get();
        }

        // ================
        // D2 → D3 (KB → KC)
        // ================
        $d2_prefix = DB::table('kb')
            ->where('KB', $barang->D2)
            // ->where('KET', $barang->K2)
            ->where('D2', $d1_prefix)
            ->value('D2');

        $kc_data = [];
        if ($d2_prefix) {
            $kc_data = DB::table('kc')
                ->where('D3', $d1sampaid2)
                ->get();
        }

        // return $kc_data;

        // ================
        // D3 → D4 (KC → KD)
        // ================
        $d3_prefix = DB::table('kc')
            ->where('KC', $barang->D3)
            ->where('D3', $d1sampaid2)
            ->value('D3');

        $kd_data = [];
        if ($d3_prefix) {
            $kd_data = DB::table('kd')
                ->where('D4', $d1sampaid3)
                ->get();
        }

        // return $kd_data;


        // ================
        // D4 → D5 (KD → KE)
        // ================
        $d4_prefix = DB::table('kd')
            ->where('KD', $barang->D4)
            ->where('D4', $d1sampaid3)
            ->value('D4');

        $ke_data = [];
        if ($d4_prefix) {
            $ke_data = DB::table('ke')
                ->where('D5', $d1sampaid4)
                ->get();
        }

        // Ambil data untuk dropdown kode (Dx)
        $d6_data = DB::table('d6')
            ->where('D5', $d1sampaid5)
            ->orderBy('D6')
            ->get()
            ->unique('KET')
            ->values();

        $d8_data = DB::table('d8')
            ->where('D5', $d1sampaid5)
            ->orderBy('D8')
            ->get()
            ->unique('KET')
            ->values();

        $d10_data = DB::table('d10')
            ->where('D5', $d1sampaid5)
            ->orderBy('D10')
            ->get()
            ->unique('KET')
            ->values();

        $d12_data = DB::table('d12')
            ->where('D5', $d1sampaid5)
            ->orderBy('D12')
            ->get()
            ->unique('KET')
            ->values();

        $d14_data = DB::table('d14')
            ->where('D5', $d1sampaid5)
            ->orderBy('D14')
            ->get()
            ->unique('KET')
            ->values();

        $d16_data = DB::table('d16')
            ->where('D5', $d1sampaid5)
            ->orderBy('D16')
            ->get()
            ->unique('KET')
            ->values();

        $d18_data = DB::table('d18')
            ->where('D5', $d1sampaid5)
            ->orderBy('D18')
            ->get()
            ->unique('KET')
            ->values();

        $d20_data = DB::table('d20')
            ->where('D5', $d1sampaid5)
            ->orderBy('D20')
            ->get()
            ->unique('KET')
            ->values();

        $d22_data = DB::table('d22')
            ->where('D5', $d1sampaid5)
            ->orderBy('D22')
            ->get()
            ->unique('KET')
            ->values();

        $d24_data = DB::table('d24')
            ->where('D5', $d1sampaid5)
            ->orderBy('D24')
            ->get()
            ->unique('KET')
            ->values();

        // Ambil data untuk dropdown nilai (Dx_value) - berdasarkan D5 dan KET yang dipilih
        // Ini akan diisi melalui AJAX, tapi untuk keperluan edit, kita bisa ambil data nilai yang sudah ada

        $d6_nilai_data = DB::table('d6')->where('D5', $d1sampaid5)->get(['D6', 'NILAI', 'D5']);
        $d8_nilai_data = DB::table('d8')->where('D5', $d1sampaid5)->get(['D8', 'NILAI', 'D5']);
        $d10_nilai_data = DB::table('d10')->where('D5', $d1sampaid5)->get(['D10', 'NILAI', 'D5']);
        $d12_nilai_data = DB::table('d12')->where('D5', $d1sampaid5)->get(['D12', 'NILAI', 'D5']);
        $d14_nilai_data = DB::table('d14')->where('D5', $d1sampaid5)->get(['D14', 'NILAI', 'D5']);
        $d16_nilai_data = DB::table('d16')->where('D5', $d1sampaid5)->get(['D16', 'NILAI', 'D5']);
        $d18_nilai_data = DB::table('d18')->where('D5', $d1sampaid5)->get(['D18', 'NILAI', 'D5']);
        $d20_nilai_data = DB::table('d20')->where('D5', $d1sampaid5)->get(['D20', 'NILAI', 'D5']);
        $d22_nilai_data = DB::table('d22')->where('D5', $d1sampaid5)->get(['D22', 'NILAI', 'D5']);
        $d24_nilai_data = DB::table('d24')->where('D5', $d1sampaid5)->get(['D24', 'NILAI', 'D5']);

        // Ambil keterangan selected untuk masing-masing D (berdasarkan D5 dan D6 yang dipilih)
        $d6_keterangan_selected = DB::table('d6')->where('D5', $d1sampaid5)->where('D6', $barang->D6)->value('KET') ?? null;
        $d8_keterangan_selected = DB::table('d8')->where('D5', $d1sampaid5)->where('D8', $barang->D8)->value('KET') ?? null;
        $d10_keterangan_selected = DB::table('d10')->where('D5', $d1sampaid5)->where('D10', $barang->D10)->value('KET') ?? null;
        $d12_keterangan_selected = DB::table('d12')->where('D5', $d1sampaid5)->where('D12', $barang->D12)->value('KET') ?? null;
        $d14_keterangan_selected = DB::table('d14')->where('D5', $d1sampaid5)->where('D14', $barang->D14)->value('KET') ?? null;
        $d16_keterangan_selected = DB::table('d16')->where('D5', $d1sampaid5)->where('D16', $barang->D16)->value('KET') ?? null;
        $d18_keterangan_selected = DB::table('d18')->where('D5', $d1sampaid5)->where('D18', $barang->D18)->value('KET') ?? null;
        $d20_keterangan_selected = DB::table('d20')->where('D5', $d1sampaid5)->where('D20', $barang->D20)->value('KET') ?? null;
        $d22_keterangan_selected = DB::table('d22')->where('D5', $d1sampaid5)->where('D22', $barang->D22)->value('KET') ?? null;
        $d24_keterangan_selected = DB::table('d24')->where('D5', $d1sampaid5)->where('D24', $barang->D24)->value('KET') ?? null;

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
            'd14_data',
            'd16_data',
            'd18_data',
            'd20_data',
            'd22_data',
            'd24_data',
            'd6_nilai_data',
            'd8_nilai_data',
            'd10_nilai_data',
            'd12_nilai_data',
            'd14_nilai_data',
            'd16_nilai_data',
            'd18_nilai_data',
            'd20_nilai_data',
            'd22_nilai_data',
            'd24_nilai_data',
            'id',
            'd1sampaid4',
            'd1sampaid3',
            'd1sampaid2',
            'd1sampaid5',
            'd6_keterangan_selected',
            'd8_keterangan_selected',
            'd10_keterangan_selected',
            'd12_keterangan_selected',
            'd14_keterangan_selected',
            'd16_keterangan_selected',
            'd18_keterangan_selected',
            'd20_keterangan_selected',
            'd22_keterangan_selected',
            'd24_keterangan_selected'
        ));
    }

    public function processOld(Request $request)
    {
        return $request;

        // 1. Cek apakah KD_BRG sudah digunakan oleh record lain
        $cek = DB::table('barang_asli')
            ->where('KD_BRG', $request->KD_BRG)
            ->where('ID', '!=', $request->ID) // pastikan bukan dirinya sendiri
            ->exists();

        if ($cek) {
            return redirect()->back()->with('error', 'Kode tersebut sudah digunakan');
        }

        // Ambil data KA berdasarkan D1, hanya 1 row
        $ka = DB::table('ka')->where('KA', $request->D1)->get()->last();
        $kb = DB::table('kb')->where('KB', $request->D2)->where('D2', substr($request->KD_BRG, 0, 1))->get()->last();
        $kc = DB::table('kc')->where('KC', $request->D3)->where('D3', substr($request->KD_BRG, 0, 2))->get()->last();
        $kd = DB::table('kd')->where('KD', $request->D4)->where('D4', substr($request->KD_BRG, 0, 3))->get()->last();
        $ke = DB::table('ke')->where('KE', $request->D5)->where('D5', substr($request->KD_BRG, 0, 4))->get()->last();

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

    public function process(Request $request)
    {
        // return $request;

        // 1. Cek apakah KD_BRG sudah digunakan oleh record lain
        $cek = DB::table('barang_asli')
            ->where('KD_BRG', $request->KD_BRG)
            ->where('ID', '!=', $request->ID) // pastikan bukan dirinya sendiri
            ->exists();

        if ($cek) {
            return redirect()->back()->with('error', 'Kode tersebut sudah digunakan');
        }

        // Ambil data KA berdasarkan D1, hanya 1 row
        $ka = DB::table('ka')->where('KA', $request->D1)->get()->last();
        $kb = DB::table('kb')->where('KB', $request->D2)->where('D2', substr($request->KD_BRG, 0, 1))->get()->last();
        $kc = DB::table('kc')->where('KC', $request->D3)->where('D3', substr($request->KD_BRG, 0, 2))->get()->last();
        $kd = DB::table('kd')->where('KD', $request->D4)->where('D4', substr($request->KD_BRG, 0, 3))->get()->last();
        $ke = DB::table('ke')->where('KE', $request->D5)->where('D5', substr($request->KD_BRG, 0, 4))->get()->last();

        $d1sampaid5 = substr($request->KD_BRG, 0, 5);

        // Ambil data D6-D24 berdasarkan nilai yang dipilih (D6_value, D8_value, dll)
        $d6 = DB::table('d6')->where('D6', $request->D6_value)->where('D5', $d1sampaid5)->get()->last();
        $d8 = DB::table('d8')->where('D8', $request->D8_value)->where('D5', $d1sampaid5)->get()->last();
        $d10 = DB::table('d10')->where('D10', $request->D10_value)->where('D5', $d1sampaid5)->get()->last();
        $d12 = DB::table('d12')->where('D12', $request->D12_value)->where('D5', $d1sampaid5)->get()->last();
        $d14 = DB::table('d14')->where('D14', $request->D14_value)->where('D5', $d1sampaid5)->get()->last();
        $d16 = DB::table('d16')->where('D16', $request->D16_value)->where('D5', $d1sampaid5)->get()->last();
        $d18 = DB::table('d18')->where('D18', $request->D18_value)->where('D5', $d1sampaid5)->get()->last();
        $d20 = DB::table('d20')->where('D20', $request->D20_value)->where('D5', $d1sampaid5)->get()->last();
        $d22 = DB::table('d22')->where('D22', $request->D22_value)->where('D5', $d1sampaid5)->get()->last();
        $d24 = DB::table('d24')->where('D24', $request->D24_value)->where('D5', $d1sampaid5)->get()->last();

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
            'K6' => ($d6->KET ?? '') . ' - ' . ($d6->NILAI ?? ''),
            'K8' => ($d8->KET ?? '') . ' - ' . ($d8->NILAI ?? ''),
            'K10' => ($d10->KET ?? '') . ' - ' . ($d10->NILAI ?? ''),
            'K12' => ($d12->KET ?? '') . ' - ' . ($d12->NILAI ?? ''),
            'K14' => ($d14->KET ?? '') . ' - ' . ($d14->NILAI ?? ''),
            'K16' => ($d16->KET ?? '') . ' - ' . ($d16->NILAI ?? ''),
            'K18' => ($d18->KET ?? '') . ' - ' . ($d18->NILAI ?? ''),
            'K20' => ($d20->KET ?? '') . ' - ' . ($d20->NILAI ?? ''),
            'K22' => ($d22->KET ?? '') . ' - ' . ($d22->NILAI ?? ''),
            'K24' => ($d24->KET ?? '') . ' - ' . ($d24->NILAI ?? ''),
        ]);

        // return $request;

        $update = DB::table('barang_asli')
            ->where('ID', $request->ID)
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
                'D6' => $request->D6_value ?? '00',
                'K6' => $request->K6 ?? null,
                'D8' => $request->D8_value ?? '00',
                'K8' => $request->K8 ?? null,
                'D10' => $request->D10_value ?? '00',
                'K10' => $request->K10 ?? null,
                'D12' => $request->D12_value ?? '00',
                'K12' => $request->K12 ?? null,
                'D14' => $request->D14_value ?? '00',
                'K14' => $request->K14 ?? null,
                'D16' => $request->D16_value ?? '00',
                'K16' => $request->K16 ?? null,
                'D18' => $request->D18_value ?? '00',
                'K18' => $request->K18 ?? null,
                'D20' => $request->D20_value ?? '00',
                'K20' => $request->K20 ?? null,
                'D22' => $request->D22_value ?? '00',
                'K22' => $request->K22 ?? null,
                'D24' => $request->D24_value ?? '00',
                'K24' => $request->K24 ?? null,
            ]);

        return redirect()->route('barang_sudah_diperbarui')->with('success', "Data berhasil diperbarui");
    }

}
