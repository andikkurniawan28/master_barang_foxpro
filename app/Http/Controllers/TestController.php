<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->generateNextBarangId();
    }

    private function generateNextBarangId()
    {
        // 1. Ambil ID terbesar dari database
        $maxId = DB::table('barang_asli')
            ->select('ID')
            ->where('ID', 'like', '__export__.product_product_%')
            ->orderByRaw("CAST(SUBSTRING(ID, LENGTH('__export__.product_product_') + 1) AS UNSIGNED) DESC")
            ->first();

        // 2. Jika tidak ditemukan, mulai dari angka pertama
        if (!$maxId) {
            return "__export__.product_product_1";
        }

        // 3. Ambil angka dari ID
        $prefix = "__export__.product_product_";
        $currentNumber = (int) str_replace($prefix, '', $maxId->ID);

        // 4. Increment
        $nextNumber = $currentNumber + 1;

        // 5. Kembalikan ID baru
        return $prefix . $nextNumber;
    }
}
