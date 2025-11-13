<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDropdownD2Controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($ka)
    {
        // $d1Record = DB::table('ka')->where('KA', $ka)->first();
        // if (!$d1Record) {
        //     return null;
        // }
        // $d1 = $d1Record->D1;
        $kbData = DB::table('kb')->where('D2', 'like', $ka.'%')->get();
        return $kbData->isEmpty() ? null : $kbData;
    }
}
