<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class quanlybanController extends Controller
{
    public function quanlyban(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $khuvuc = DB::table('khuvuc')
                    ->where('idquan', $thanhvien->idquan)
                    ->get();

        $ban = DB::table('ban')
                    ->where('idquan', $thanhvien->idquan)
                    ->get();

        return view('ban.quanlyban', compact('thanhvien','khuvuc','ban'));
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
