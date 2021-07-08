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
            ->orderBy('tenkhuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();
        $khuvuc2 = DB::table('khuvuc')
            ->orderBy('tenkhuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->first();
        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$khuvuc2->id)
            ->where('hidden',0)
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
                    ->orderBy('tenkhuvuc')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();
        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$request->idkhuvuc)
            ->where('hidden',0)
            ->get();
        
        return view('order.hoadon',compact('thanhvien','khuvuc','ban','idkhuvuc'));
    }



    public function taohoadon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        $hoadon['idquan'] = $thanhvien->idquan;
        $hoadon['idkhuvuc'] = $request->idkhuvuc;
        $hoadon['idban'] = $request->idban;
        $hoadon['idthanhvien'] = $thanhvien->id;
        $hoadon['thoigian'] = date('Y-m-d H:i:s');
        $check = DB::table('ban')
            ->where('idquan', $thanhvien->idquan)
            ->where('id', $request->idban)
            ->where('trangthai',1)
            ->first();
        if($check){
            return back()->withErrors(['Bàn đang bận, không thể tạo hóa đơn']);
        }
        else{
            $ban['trangthai'] = 1;
            DB::table('ban')
                ->where('id',$request->idban)
                ->update($ban);
            $id = DB::table('hoadon')->insertGetID($hoadon);
            return back();
        }
    }
    public function deletehoadon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $hoadon = DB::table('hoadon')
            ->where('idquan',$thanhvien->idquan)
            ->where('idban',$id)
            ->where('trangthai',0)
            ->first();
        $id = $hoadon->id;
        $idban = $hoadon->idban;

        $check = DB::table('chitiet')
            ->where('idhoadon',$id)
            ->first();
        if($check){
            return back()->withErrors(['Hóa đơn này không thể xóa']);
        }
        else{
            $ban['trangthai'] = 0;
            DB::table('ban')
                ->where('id',$idban)
                ->update($ban);
             DB::table('hoadon')
                ->where('idquan',$thanhvien->idquan)
                ->where('id',$id)
                ->delete();
            return back();
        }
    }



    public function doibanhoadon($id){//idban
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $hoadon = DB::table('hoadon')
            ->where('idquan',$thanhvien->idquan)
            ->where('idban',$id)
            ->where('trangthai',0)
            ->first();

        $id = $hoadon->id;//idhoadon
        $idkhuvuc = $hoadon->idkhuvuc;
        $idbancu = $hoadon->idban;
        
        $khuvuc = DB::table('khuvuc')
            ->orderBy('tenkhuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();

        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$idkhuvuc)
            ->where('hidden',0)
            ->where('trangthai',0)
            ->get();
        
        return view('order.doibanhoadon',compact('thanhvien','khuvuc','ban','id','idkhuvuc','idbancu'));
    }
    public function doikhuvuchoadon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        $id = $request->id;//idhoadon
        $idkhuvuc = $request->idkhuvuc;
        $idbancu = $request->idbancu;

        $khuvuc = DB::table('khuvuc')
                    ->orderBy('tenkhuvuc')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();
        
        $ban = DB::table('ban')
            ->where('idquan',$thanhvien->idquan)
            ->where('idkhuvuc',$idkhuvuc)
            ->where('hidden',0)
            ->where('trangthai',0)
            ->get();
        
        return view('order.doibanhoadon',compact('thanhvien','khuvuc','ban','id','idkhuvuc','idbancu'));
    }
    public function dodoibanhoadon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        $id = $request->id;//idhoadon
        $idkhuvuc = $request->idkhuvuc;
        $idbancu = $request->idbancu;
        $idbanmoi = $request->idban;
        $bancu['trangthai'] = 0;
        $banmoi['trangthai'] = 1;
        DB::table('ban')
            ->where('id',$idbancu)
            ->update($bancu);

        DB::table('ban')
            ->where('id',$idbanmoi)
            ->update($banmoi);

        $hoadon['idkhuvuc'] = $idkhuvuc;
        $hoadon['idban'] = $idbanmoi;
        DB::table('hoadon')
            ->where('id',$id)
            ->update($hoadon);
        
        return redirect()->route('hoadon');
    }



    public function doimonhoadon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $hoadon = DB::table('hoadon')
            ->where('idquan',$thanhvien->idquan)
            ->where('idban',$id)
            ->where('trangthai',0)
            ->first();
        $id = $hoadon->id;//idhoadon

        $thucdon = DB::table('thucdon')
                    ->orderBy('loaimon')
                    ->orderBy('tenmon')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();
        $chitiet = DB::table('chitiet')
            ->where('idhoadon',$id)
            ->join('thucdon','chitiet.idthucdon','=','thucdon.id')
            ->select('chitiet.*','thucdon.tenmon','thucdon.dongia','thucdon.loaimon')
            ->get();
        return view('order.datmon',compact('thanhvien','id','thucdon','chitiet'));
    }
    public function datmon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $thucdon = DB::table('thucdon')
                    ->orderBy('loaimon')
                    ->orderBy('tenmon')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();
        $id = $request->id;
        $idthucdon = $request->idthucdon;
        $soluong = $request->soluong;
        $chitiet2['idhoadon'] = $id;
        $chitiet2['idthucdon'] = $idthucdon;
        $chitiet2['soluong'] = $soluong;

        $thucdon2 = DB::table('thucdon')
            ->where('idquan',$thanhvien->idquan)
            ->where('id', $idthucdon)
            ->first();
        
        $chitiet2['gia'] = $thucdon2->dongia * $soluong;
        DB::table('chitiet')->insert($chitiet2);

        $chitiet = DB::table('chitiet')
            ->where('idhoadon',$id)
            ->join('thucdon','chitiet.idthucdon','=','thucdon.id')
            ->select('chitiet.*','thucdon.tenmon','thucdon.dongia','thucdon.loaimon')
            ->get();

        return view('order.datmon',compact('thanhvien', 'id','thucdon','chitiet'));
    }
    public function xoamonhoadon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
                    
        $chitiet = DB::table('chitiet')
            ->where('id',$request->id)
            ->first();
        $hoadon = DB::table('hoadon')
            ->where('id',$chitiet->idhoadon)
            ->first();
        $idban = $hoadon->idban;
            
        DB::table('chitiet')
            ->where('id',$request->id)
            ->where('trangthai',0)
            ->delete();
        
        return redirect()->route('doimonhoadon',['id'=>$idban]);
    }
    public function doisoluongmonhoadon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $id = $request->id;//idchitiet
        $chitiet['soluong'] = $request->soluong;
        $chitiet['gia'] = $request->dongia * $request->soluong;
        DB::table('chitiet')
            ->where('id',$id)
            ->update($chitiet);

        $chitiet2 = DB::table('chitiet')
            ->where('id',$request->id)
            ->first();
        $hoadon = DB::table('hoadon')
            ->where('id',$chitiet2->idhoadon)
            ->first();
        $idban = $hoadon->idban;
        
        return redirect()->route('doimonhoadon',['id'=>$idban]);
    }


    
    public function tamtinh(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $hoadon = DB::table('hoadon')
            ->where('idquan',$thanhvien->idquan)
            ->where('idban',$id)
            ->where('trangthai',0)
            ->first();
        $id = $hoadon->id;//idhoadon
        
    }
}