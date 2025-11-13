<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDropdownD5Controller extends Controller
{
    public function __invoke($kd)
    {
        // $d4Record = DB::table('kd')->where('KD', $kd)->first();
        // if (!$d4Record) {
        //     return null;
        // }
        // $d4 = $d4Record->D4;
        $keData = DB::table('ke')->where('D5', 'like', $kd.'%')->get();
        return $keData->isEmpty() ? null : $keData;
    }
}
