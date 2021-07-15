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
        $hoadonluu = null;
        $luong = null;


        return view('ngansach.quanlyngansach',compact('thanhvien','kho','hoadonluu','luong'));
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
            ->orderBy('kho.id')
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


        $hoadonluu = null;
        $luong = null;


        return view('ngansach.quanlyngansach', compact('thanhvien','kho','tong','tungay','denngay','total','hoadonluu','luong',
            'thang1','thang2','thang3','thang4','thang5','thang6','thang7','thang8','thang9','thang10','thang11','thang12'));
    }

    public function quanlybanhang(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();


        $kho = null;
        $luong = null;


        $tungay = $request->tungay;
        $denngay = $request->denngay;
        if($tungay==null){
            $tungay = date('Y-m-01');
        }
        if($denngay==null){
            $denngay = date('Y-m-t');
        }


        $hoadonluu = DB::table('hoadonluu')
            ->where('hoadonluu.idquan',$thanhvien->idquan)
            ->where('thanhtien','!=',null)
            ->whereBetween('thoigian',[$tungay,$denngay])
            ->get();
        $tonggiamgia = 0;
        $tongthanhtien = 0;
        foreach($hoadonluu as $key => $row){
            $tonggiamgia = $tonggiamgia + $row->giamgia;
            $tongthanhtien = $tongthanhtien + $row->thanhtien;
        }


        $tungay2 = new DateTime($tungay);
        $tungay3 = date_format($tungay2,'Y');
        $totalgiamgia = array();
        $totalthanhtien = array();
        for($i=1;$i<=12;$i++){
            $hoadonluu2 = DB::table('hoadonluu')
                ->where('hoadonluu.idquan',$thanhvien->idquan)
                ->where('thoigian', 'like', $tungay3.'-0'.$i.'-%'.' '.'%%:%%:%%')
                ->orWhere('thoigian', 'like', $tungay3.'-'.$i.'-%'.' '.'%%:%%:%%')
                ->get();
            $totalgiamgia[$i] = 0;
            $totalthanhtien[$i] = 0;
            foreach ($hoadonluu2 as $row){
                $totalgiamgia[$i] = $totalgiamgia[$i] + $row->giamgia;
                $totalthanhtien[$i] = $totalthanhtien[$i] + $row->thanhtien;
            }
        }

        
        $thang1giamgia = $totalgiamgia[1];    $thang1thanhtien = $totalthanhtien[1];
        $thang2giamgia = $totalgiamgia[2];    $thang2thanhtien = $totalthanhtien[2];
        $thang3giamgia = $totalgiamgia[3];    $thang3thanhtien = $totalthanhtien[3];
        $thang4giamgia = $totalgiamgia[4];    $thang4thanhtien = $totalthanhtien[4];
        $thang5giamgia = $totalgiamgia[5];    $thang5thanhtien = $totalthanhtien[5];
        $thang6giamgia = $totalgiamgia[6];    $thang6thanhtien = $totalthanhtien[6];
        $thang7giamgia = $totalgiamgia[7];    $thang7thanhtien = $totalthanhtien[7];
        $thang8giamgia = $totalgiamgia[8];    $thang8thanhtien = $totalthanhtien[8];
        $thang9giamgia = $totalgiamgia[9];    $thang9thanhtien = $totalthanhtien[9];
        $thang10giamgia = $totalgiamgia[10];  $thang10thanhtien = $totalthanhtien[10];
        $thang11giamgia = $totalgiamgia[11];  $thang11thanhtien = $totalthanhtien[11];
        $thang12giamgia = $totalgiamgia[12];  $thang12thanhtien = $totalthanhtien[12];



        // $soluong = 0;
        // $hoadonluu2 = DB::table('hoadonluu')
        //     ->where('idquan',$thanhvien->idquan)
        //     ->where('tenmon','Nước chanh')
        //     ->get();
        // foreach ($hoadonluu2 as $row){
        //     $soluong = $soluong + $row->soluong;
        // }
        // echo $soluong;
        $banchay = array();
        $i = 0;
        $thucdon2 = DB::table('thucdon')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        foreach ($thucdon2 as $key => $row){
            $hoadonluu2 = DB::table('hoadonluu')
                ->where('hoadonluu.idquan',$thanhvien->idquan)
                ->where('tenmon',$row->tenmon)
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->sum('soluong');
            $banchay[$i]['tenmon'] = $row->tenmon;
            $banchay[$i]['soluong'] = $hoadonluu2;
            $i++;
        }
        $tongmon = DB::table('hoadonluu')
                ->where('hoadonluu.idquan',$thanhvien->idquan)
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->sum('soluong');

                
        $nhanvien = array();
        $i = 0;
        $thanhvien2 = DB::table('thanhvien')
            ->where('idquan',$thanhvien->idquan)
            ->get();
        foreach ($thanhvien2 as $key => $row){
            $hoadonluu3 = DB::table('hoadonluu')
                ->where('hoadonluu.idquan',$thanhvien->idquan)
                ->where('tenthanhvien',$row->hoten)
                ->whereNotNull('thanhtien')
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->get();
            $nhanvien[$i]['tenthanhvien'] = $row->hoten;
            $nhanvien[$i]['sohoadon'] = count($hoadonluu3);
            $i++;
        }
        $hoadonluu4 = DB::table('hoadonluu')
                ->where('hoadonluu.idquan',$thanhvien->idquan)
                ->whereNotNull('thanhtien')
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->get();
        $tonghoadon = count($hoadonluu4);

        
        return view('ngansach.quanlyngansach', compact('thanhvien','kho','hoadonluu','luong','tonggiamgia','tongthanhtien','tungay','denngay','totalgiamgia','totalthanhtien',
        'thang1giamgia','thang2giamgia','thang3giamgia','thang4giamgia','thang5giamgia','thang6giamgia',
        'thang7giamgia','thang8giamgia','thang9giamgia','thang10giamgia','thang11giamgia','thang12giamgia',
        'thang1thanhtien','thang2thanhtien','thang3thanhtien','thang4thanhtien','thang5thanhtien','thang6thanhtien',
        'thang7thanhtien','thang8thanhtien','thang9thanhtien','thang10thanhtien','thang11thanhtien','thang12thanhtien',
        'banchay','nhanvien','tongmon','tonghoadon'));
    }

    public function quanlyluong(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();


        $kho = null;
        $hoadonluu = null;


        $tungay = $request->tungay;
        $denngay = $request->denngay;
        if($tungay==null){
            $tungay = date('Y-m-01');
        }
        if($denngay==null){
            $denngay = date('Y-m-t');
        }


        $luong = array();
        $i = 0;
        $thanhvien2 = DB::table('thanhvien')
            ->where('thanhvien.idquan',$thanhvien->idquan)
            ->join('vaitro', 'thanhvien.idvaitro', '=', 'vaitro.id')
            ->select('thanhvien.*','vaitro.tenvaitro')
            ->get();
        foreach ($thanhvien2 as $key => $row){
            $lichlamviec = DB::table('lichlamviec')
                ->where('lichlamviec.idquan',$row->idquan)
                ->where('idthanhvien',$row->id)
                ->where('diemdanh',1)
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->get();
            $lichlamviec2 = DB::table('lichlamviec')
                ->where('lichlamviec.idquan',$row->idquan)
                ->where('idthanhvien',$row->id)
                ->where('diemdanh',0)
                ->whereBetween('thoigian',[$tungay,$denngay])
                ->get();
            $luong[$i]['id'] = $row->id;
            $luong[$i]['hoten'] = $row->hoten;
            $luong[$i]['chucvu'] = $row->tenvaitro;
            $luong[$i]['comat'] = count($lichlamviec);
            $luong[$i]['vang'] = count($lichlamviec2);
            $luong[$i]['sobuoi'] = count($lichlamviec) + count($lichlamviec2);
            $luong[$i]['thulao'] = $row->luong * count($lichlamviec);
            $i++;
        }


        return view('ngansach.quanlyngansach', compact('thanhvien','kho','hoadonluu','luong','tungay','denngay'));
    }

    public function chitietluong(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $id = $request->id;
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();
        $calam = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();
        $lichlamviec = DB::table('lichlamviec')
            ->orderBy('hoten')
            ->where('lichlamviec.idquan',$thanhvien->idquan)
            ->where('thoigian',date('Y-m-d'))
            ->where('idthanhvien',$id)
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->select('lichlamviec.*','thanhvien.hoten')
            ->get();
        $date = date('Y-m-d');
        return view('ngansach.chitietluong',compact('thanhvien','khuvuc','calam','lichlamviec','date','id'));
    }

    public function xemchitietluong(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $date = $request->thoigian;
        $id = $request->id;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $khuvuc = DB::table('khuvuc')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();
        $calam = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->get();
        $lichlamviec = DB::table('lichlamviec')
            ->orderBy('hoten')
            ->where('lichlamviec.idquan',$thanhvien->idquan)
            ->where('thoigian',$date)
            ->where('idthanhvien',$id)
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->select('lichlamviec.*','thanhvien.hoten')
            ->get();
        
        return view('ngansach.chitietluong',compact('thanhvien','khuvuc','calam','lichlamviec','date','id'));
    }
}
