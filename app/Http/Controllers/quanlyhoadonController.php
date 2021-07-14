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
class quanlyhoadonController extends Controller
{
    public function quanlyhoadon(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $hoadonluu = DB::table('hoadonluu')
            ->orderBy('id','desc')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        
        return view('hoadon.quanlyhoadon',compact('thanhvien','hoadonluu'));
    }
    public function xemhoadon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan','quan.diachiquan','quan.website','quan.sdtquan')
                    ->first();
        
        $hoadonluu1 = DB::table('hoadonluu')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('idhoadon',$id)
                    ->whereNotNull('thanhtien')
                    ->first();
        $hoadonluu2 = DB::table('hoadonluu')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('idhoadon',$id)
                    ->whereNotNull('loaimon')
                    ->get();
        
        return view('hoadon.xemhoadon',compact('thanhvien','hoadonluu1','hoadonluu2'));
    }
}