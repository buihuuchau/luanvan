<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class quanlyngansachController extends Controller
{
    public function quanlyngansach(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();
        $kho = null;

        return view('ngansach.quanlyngansach',compact('thanhvien','kho'));
    }
    public function quanlynhaphang(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $tungay = $request->tungay;
        $denngay = $request->denngay;
        if($tungay==null){
            $tungay = date('Y-m-01');
        }
        if($denngay==null){
            $denngay = date('Y-m-t');
        }
        

        $kho = DB::table('kho')
            ->where('kho.idquan',$thanhvien->idquan)
            ->whereBetween('ngaynhap', [$tungay,$denngay])
            ->join('nguyenlieu', 'kho.idnguyenlieu','=','nguyenlieu.id')
            ->get();

        $tong = 0;
        foreach ($kho as $key => $row){
            $tong = $tong + $row->thanhtien;
        }

        $tungay2 = new DateTime($tungay);
        $tungay3 = date_format($tungay2,'Y');

        $total = array();
        for($i=1;$i<=12;$i++){
            $kho2 = DB::table('kho')
                ->where('kho.idquan',$thanhvien->idquan)
                ->where('ngaynhap', 'like', $tungay3.'-0'.$i.'-%')
                ->orWhere('ngaynhap', 'like', $tungay3.'-'.$i.'-%')
                ->get();
            $total[$i] = 0;
            foreach ($kho2 as $row){
                $total[$i] = $total[$i] + $row->thanhtien;
            }
        }
        $thang1 = $total[1];
        $thang2 = $total[2];
        $thang3 = $total[3];
        $thang4 = $total[4];
        $thang5 = $total[5];
        $thang6 = $total[6];
        $thang7 = $total[7];
        $thang8 = $total[8];
        $thang9 = $total[9];
        $thang10 = $total[10];
        $thang11 = $total[11];
        $thang12 = $total[12];
        return view('ngansach.quanlyngansach', compact('thanhvien','kho','tong','tungay','denngay','total',
            'thang1','thang2','thang3','thang4','thang5','thang6','thang7','thang8','thang9','thang10','thang11','thang12'));
    }
}
