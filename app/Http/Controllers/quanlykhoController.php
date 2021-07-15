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

class quanlykhoController extends Controller
{
    public function quanlykho(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $nguyenlieu = DB::table('nguyenlieu')
                    ->orderBy('tennguyenlieu')
                    ->where('idquan',$thanhvien->idquan)
                    ->where('hidden',0)
                    ->get();

        $kho = DB::table('kho')
                    ->orderBy('id','desc')
                    ->where('kho.idquan', $thanhvien->idquan)
                    ->join('nguyenlieu','kho.idnguyenlieu','=','nguyenlieu.id')
                    ->select('kho.*','nguyenlieu.tennguyenlieu','nguyenlieu.xuatxu','nguyenlieu.donvitinh')
                    ->get();

        return view('kho.quanlykho', compact('thanhvien','nguyenlieu','kho'));
    }

    // public function addkho(){
    //     $ssidthanhvien = Session::get('ssidthanhvien');

    //     $thanhvien = DB::table('thanhvien')
    //                 ->where('thanhvien.id',$ssidthanhvien)
    //                 ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
    //                 ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
    //                 ->first();

    //     $nguyenlieu = DB::table('nguyenlieu')
    //                 ->orderBy('tennguyenlieu')
    //                 ->where('idquan',$thanhvien->idquan)
    //                 ->where('hidden',0)
    //                 ->get();

    //     return view('kho.addkho',compact('thanhvien','nguyenlieu'));
    // }

    public function doaddkho(Request $request){
        Carbon::setLocale('vi');
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        
        $kho['idquan'] = $thanhvien->idquan;
        $kho['idnguyenlieu'] = $request->idnguyenlieu;
        $kho['dongia'] = $request->dongia;
        $kho['soluong'] = $request->soluong;
        $kho['thanhtien'] = $request->dongia*$request->soluong;
        $kho['ngaynhap'] = date('Y-m-d');
        DB::table('kho')->insert($kho);
        return back();
    }

    public function hethangkho($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $kho['trangthai'] = 0;
        $kho['ngayhet'] = date('Y-m-d');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('kho')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($kho);
        
        return back();
    }
    public function conhangkho($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $kho['trangthai'] = 1;
        $kho['ngayhet'] = null;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('kho')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($kho);
        
        return back();
    }

    public function deletekho($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('kho')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
