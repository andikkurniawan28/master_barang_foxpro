<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDropdownD4Controller extends Controller
{
    public function __invoke($kc)
    {
        // $d3Record = DB::table('kc')->where('KC', $kc)->first();
        // if (!$d3Record) {
        //     return null;
        // }
        // $d3 = $d3Record->D3;
        $kdData = DB::table('kd')->where('D4', 'like', $kc.'%')->get();
        return $kdData->isEmpty() ? null : $kdData;
    }
}
