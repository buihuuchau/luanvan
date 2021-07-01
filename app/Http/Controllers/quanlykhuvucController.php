<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class quanlykhuvucController extends Controller
{
    public function quanlykhuvuc(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $khuvuc = DB::table('khuvuc')
                ->where('idquan',$thanhvien->idquan)
                ->get();
        $ban = DB::table('ban')
                ->where('idquan',$thanhvien->idquan)
                ->get();

        return view('khuvuc.quanlykhuvuc',compact('thanhvien','khuvuc','ban'));
    }

    public function addkhuvuc(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        return view('khuvuc.addkhuvuc',compact('thanhvien'));
    }

    public function doaddkhuvuc(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('tenkhuvuc',$request->tenkhuvuc)
            ->first();
        if($check){
            return back()->withErrors(['Khu vực đã tồn tại']);
        }
        else{
            $khuvuc['idquan'] = $thanhvien->idquan;
            $khuvuc['tenkhuvuc'] = $request->tenkhuvuc;
            $khuvuc = DB::table('khuvuc')->insert($khuvuc);
            return back();
        }       
        
    }

    public function editkhuvuc($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $khuvuc = DB::table('khuvuc')
            ->where('id',$id)
            ->first();
                
        return view('khuvuc.editkhuvuc',compact('thanhvien','khuvuc'));
    }

    public function doeditkhuvuc(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('tenkhuvuc',$request->tenkhuvuc)
            ->first();
        if($check){
            return back()->withErrors(['Khu vực đã tồn tại']);
        }
        else{
            $khuvuc['tenkhuvuc'] = $request->tenkhuvuc;
            $khuvuc = DB::table('khuvuc')
                ->where('id',$request->id)
                ->update($khuvuc);
            return redirect()->route('quanlykhuvuc');
        }
    }

    public function hiddenkhuvuc($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $khuvuc['hidden'] = 1;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('khuvuc')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($khuvuc);
        
        return back();
    }
    public function showkhuvuc($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $khuvuc['hidden'] = 0;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('khuvuc')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($khuvuc);
        
        return back();
    }

    public function deletekhuvuc($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('khuvuc')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
