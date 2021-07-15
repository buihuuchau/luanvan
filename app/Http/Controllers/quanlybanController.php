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
                    ->orderBy('tenkhuvuc')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();

        $ban = DB::table('ban')
                    ->orderBy('tenkhuvuc')
                    ->orderBy('tenban')
                    ->where('ban.idquan', $thanhvien->idquan)
                    ->join('khuvuc','ban.idkhuvuc','=','khuvuc.id')
                    ->select('ban.*','khuvuc.tenkhuvuc')
                    ->get();

        $hoadon = DB::table('hoadon')
                    ->where('idquan',$thanhvien->idquan)
                    ->get();
        $sudung = null;

        return view('ban.quanlyban', compact('thanhvien','khuvuc','ban','hoadon','sudung'));
    }

    // public function addban(){
    //     $ssidthanhvien = Session::get('ssidthanhvien');

    //     $thanhvien = DB::table('thanhvien')
    //                 ->where('thanhvien.id',$ssidthanhvien)
    //                 ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
    //                 ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
    //                 ->first();

    //     $khuvuc = DB::table('khuvuc')
    //                 ->orderBy('tenkhuvuc')
    //                 ->where('idquan',$thanhvien->idquan)
    //                 ->where('hidden',0)
    //                 ->get();

    //     return view('ban.addban',compact('thanhvien','khuvuc'));
    // }

    public function doaddban(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $check = DB::table('ban')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('idkhuvuc', $request->idkhuvuc)
                    ->where('tenban', $request->tenban)
                    ->first();
        if($check){
            return back()->withErrors(['Bàn đã tồn tại']);
        }
        else{
            $ban['idquan'] = $thanhvien->idquan;
            $ban['idkhuvuc'] = $request->idkhuvuc;
            $ban['tenban'] = $request->tenban;
            DB::table('ban')->insert($ban);
            return back();
        }
    }
    public function editban($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $khuvuc = DB::table('khuvuc')
                ->where('idquan',$thanhvien->idquan)
                ->where('hidden',0)
                ->get();
        $ban = DB::table('ban')
                ->where('ban.id',$id)
                ->join('khuvuc','ban.idkhuvuc','=','khuvuc.id')
                ->select('ban.*','khuvuc.tenkhuvuc')
                ->first();
        
        return view('ban.editban',compact('thanhvien','khuvuc','ban'));
    }

    public function doeditban(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $check = DB::table('ban')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('idkhuvuc', $request->idkhuvuc)
                    ->where('tenban', $request->tenban)
                    ->first();
        if($check){
            return back()->withErrors(['Bàn đã tồn tại']);
        }
        else{
            $ban['idkhuvuc'] = $request->idkhuvuc;
            $ban['tenban'] = $request->tenban;
            DB::table('ban')
                ->where('id', $request->id)
                ->update($ban);
            return back();
        }
    }

    public function hiddenban($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $ban['hidden'] = 1;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('ban')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($ban);
        
        return back();
    }
    public function showban($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $ban['hidden'] = 0;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('ban')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($ban);
        
        return back();
    }

    public function deleteban($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('ban')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
