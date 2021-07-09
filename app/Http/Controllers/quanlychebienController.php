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

class quanlychebienController extends Controller
{
    public function quanlychebien(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $chitiet = DB::table('chitiet')
                ->orderBy('trangthai')
                ->orderBy('id')
                ->join('hoadon','chitiet.idhoadon','=','hoadon.id')
                ->join('thucdon', 'chitiet.idthucdon','=','thucdon.id')
                ->where('hoadon.idquan',$thanhvien->idquan)
                ->where('hoadon.trangthai',0)
                ->select('chitiet.*','thucdon.tenmon')
                ->get();

        return view('chebien.quanlychebien', compact('thanhvien','chitiet'));
    }
    public function checkhoanthanh($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $chitiet['trangthai'] = 1;
        DB::table('chitiet')
            ->where('id',$id)
            ->update($chitiet);
        return back();
    }
    public function baohuy($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $chitiet['trangthai'] = 2;
        $chitiet['ghichu'] = 'Hết nguyên liệu';
        DB::table('chitiet')
            ->where('id',$id)
            ->update($chitiet);
        return back();
    }
    public function baohetnguyenlieu(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $kho = DB::table('kho')
                    ->where('kho.idquan', $thanhvien->idquan)
                    ->where('trangthai',1)
                    ->join('nguyenlieu','kho.idnguyenlieu','=','nguyenlieu.id')
                    ->select('kho.*','nguyenlieu.tennguyenlieu','nguyenlieu.xuatxu','nguyenlieu.donvitinh')
                    ->get();
        return view('chebien.baohetnguyenlieu',compact('thanhvien','kho'));
    }
    public function dobaohetnguyenlieu($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        $kho['trangthai'] = 2;
        DB::table('kho')
            ->where('idquan',$thanhvien->idquan)
            ->where('id',$id)
            ->update($kho);
        
        return back();
    }
}
