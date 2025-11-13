<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDropdownD3Controller extends Controller
{
    public function __invoke($kb)
    {
        // $d2Record = DB::table('kb')->where('KB', $kb)->first();
        // if (!$d2Record) {
        //     return null;
        // }
        // $d2 = $d2Record->D2;
        $kcData = DB::table('kc')->where('D3', 'like', $kb.'%')->get();
        return $kcData->isEmpty() ? null : $kcData;
    }
}
