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

class quanlykhachhangController extends Controller
{
    public function quanlykhachhang(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $khachhang = DB::table('khachhang')
                    ->where('khachhang.idquan', $thanhvien->idquan)
                    ->get();

        return view('khachhang.quanlykhachhang', compact('thanhvien','khachhang'));
    }

    // public function addkhachhang(){
    //     $ssidthanhvien = Session::get('ssidthanhvien');

    //     $thanhvien = DB::table('thanhvien')
    //                 ->where('thanhvien.id',$ssidthanhvien)
    //                 ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
    //                 ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
    //                 ->first();

    //     return view('khachhang.addkhachhang',compact('thanhvien'));
    // }

    public function doaddkhachhang(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $check = DB::table('khachhang')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('hotenkh', $request->hotenkh)
                    ->where('sdt', $request->sdt)
                    ->first();
        if($check){
            return back()->withErrors(['Khách hàng đã có tài khoản']);
        }
        else{
            $khachhang['idquan'] = $thanhvien->idquan;
            $khachhang['hotenkh'] = $request->hotenkh;
            $khachhang['sdt'] = $request->sdt;
            $khachhang['ngaydangky'] = date('Y-m-d');
            DB::table('khachhang')->insert($khachhang);
            return back();
        }
    }
    public function editkhachhang($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $khachhang = DB::table('khachhang')
                ->where('khachhang.id',$id)
                ->first();
        
        return view('khachhang.editkhachhang',compact('thanhvien','khachhang'));
    }

    public function doeditkhachhang(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $check = DB::table('khachhang')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('hotenkh', $request->hotenkh)
                    ->where('sdt', $request->sdt)
                    ->first();
        if($check){
            return back()->withErrors(['Tên hoặc số điện thoại trùng lặp']);
        }
        else{
            $khachhang['hotenkh'] = $request->hotenkh;
            $khachhang['sdt'] = $request->sdt;
            DB::table('khachhang')
                ->where('id', $request->id)
                ->update($khachhang);
            return back();
        }
    }
}
