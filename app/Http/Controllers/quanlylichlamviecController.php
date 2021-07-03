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
            ->select('lichlamviec.*','thanhvien.hoten')
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
            ->select('lichlamviec.*','thanhvien.hoten')
            ->get();
        return view('lichlamviec.xemlichlamviec',compact('thanhvien','khuvuc','calam','lichlamviec'));
    }
    public function diemdanhcomatlichlamviec($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $lichlamviec['diemdanh'] = 1;
        DB::table('lichlamviec')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($lichlamviec);
        return back();
    }
    public function diemdanhvangmatlichlamviec($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $lichlamviec['diemdanh'] = 0;
        DB::table('lichlamviec')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($lichlamviec);
        return back();
    }
    public function addlichlamviec(){
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
        $thanhvien2 = DB::table('thanhvien')
            ->where('idquan', $thanhvien->idquan)
            ->get();
        return view('lichlamviec.addlichlamviec', compact('thanhvien','khuvuc','calam','thanhvien2'));
    }
    public function doaddlichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $thanhvien2 = $request->input('idthanhvien');
        foreach ($thanhvien2 as $key => $row){
            $lichlamviec['idquan'] = $thanhvien->idquan;
            $lichlamviec['thoigian'] = $request->thoigian;
            $lichlamviec['idkhuvuc'] = $request->idkhuvuc;
            $lichlamviec['idcalam'] = $request->idcalam;
            $lichlamviec['idthanhvien'] = $row;
            DB::table('lichlamviec')->insert($lichlamviec);
        }
        return back();
    }
}
