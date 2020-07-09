<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Maincontroller extends Controller
{
    //
    public function index()
    {
        // $data_point = DB::table('view_point')->where('created_by', '=', auth()->user()->id)->get();
        // dd($data_point);
        $data_point = DB::table('view_point')
                    ->select(DB::raw('sum(poin_amount) as poin_amount'))
                     ->where('created_by', '=', auth()->user()->id)
                    //  ->groupBy('status')
                     ->get();
                    //  dd($data_point[0]);
       return view('home',['data_point' => $data_point]);
        // return view('home');
    }
}
