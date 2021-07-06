<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function hoadon(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $khuvuc2 = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->first();
        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$khuvuc2->id)
            ->get();
        $idkhuvuc = $khuvuc2->id;
        return view('order.hoadon',compact('thanhvien','khuvuc','ban','idkhuvuc'));
    }
    public function xemban(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $idkhuvuc = $request->idkhuvuc;
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$request->idkhuvuc)
            ->get();
        
        return view('order.hoadon',compact('thanhvien','khuvuc','ban','idkhuvuc'));
    }
    
}