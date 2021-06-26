<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class quanlybanController extends Controller
{
    public function quanlyban(){
        $ban = DB::table('ban')
                ->get();
        return view('ban.index', compact('ban'));
    }
    public function addban(){
        return view('ban.addban');
    }
    public function doaddban(Request $request){
        $ban = array();
        $ban['idquan'] = $request->idquan;
        $ban['idkhuvuc'] = $request->idkhuvuc;
        $ban['tenban'] = $request->tenban;
        DB::table('ban')->insert($ban);
        return back();
    }
}
