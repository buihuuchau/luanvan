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

class quanlylichlamviecController extends Controller
{
    public function quanlylichlamviec(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $calam = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $lichlamviec = DB::table('lichlamviec')
            ->where('lichlamviec.idquan',$thanhvien->idquan)
            ->where('thoigian',date('Y-m-d'))
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->get();
        return view('lichlamviec.quanlylichlamviec',compact('thanhvien','khuvuc','calam','lichlamviec'));
    }
    public function xemlichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $date = $request->thoigian;
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $calam = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        $lichlamviec = DB::table('lichlamviec')
            ->where('lichlamviec.idquan',$thanhvien->idquan)
            ->where('thoigian',$date)
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->get();
        return view('lichlamviec.xemlichlamviec',compact('thanhvien','khuvuc','calam','lichlamviec'));
    }
}
