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
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->select('lichlamviec.*','thanhvien.hoten')
            ->get();
        $date = date('Y-m-d');
        return view('lichlamviec.quanlylichlamviec',compact('thanhvien','khuvuc','calam','lichlamviec','date'));
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
            ->join('thanhvien', 'lichlamviec.idthanhvien','=','thanhvien.id')
            ->select('lichlamviec.*','thanhvien.hoten')
            ->get();
        
        return view('lichlamviec.quanlylichlamviec',compact('thanhvien','khuvuc','calam','lichlamviec','date'));
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
    public function editlichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $lichlamviec = DB::table('lichlamviec')
            ->orderBy('hoten')
            ->where('lichlamviec.idquan',$thanhvien->idquan)
            ->where('lichlamviec.idkhuvuc', $request->idkhuvuc)
            ->where('lichlamviec.idcalam', $request->idcalam)
            ->where('lichlamviec.thoigian', $request->thoigian)
            ->join('thanhvien','lichlamviec.idthanhvien','=','thanhvien.id')
            ->join('vaitro', 'thanhvien.idvaitro','=','vaitro.id')
            ->select('lichlamviec.idthanhvien','thanhvien.hoten','thanhvien.namsinh','thanhvien.id','vaitro.tenvaitro')
            ->get();
        
        $thanhvien2 = DB::table('thanhvien')
            ->orderBy('hoten')
            ->where('thanhvien.idquan',$thanhvien->idquan)
            ->where('hidden',0)
            ->join('vaitro','thanhvien.idvaitro','=','vaitro.id')
            ->select('thanhvien.*','vaitro.tenvaitro')
            ->get();
        
        $thoigian = $request->thoigian;
        $idkhuvuc = $request->idkhuvuc;
        $idcalam = $request->idcalam;
        return view('lichlamviec.editlichlamviec',compact('thanhvien','lichlamviec','thanhvien2','thoigian','idkhuvuc','idcalam'));
    }
    public function addlichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        
        $thanhvien2 = $request->input('idthanhvien');
        foreach ($thanhvien2 as $key => $row){
            $lichlamviec['thoigian'] = $request->thoigian;
            $lichlamviec['idquan'] = $thanhvien->idquan;
            $lichlamviec['idkhuvuc'] = $request->idkhuvuc;
            $lichlamviec['idcalam'] = $request->idcalam;
            $lichlamviec['idthanhvien'] = $row;
            DB::table('lichlamviec')
                ->insert($lichlamviec);
        }
        $thoigian = $request->thoigian;
        return redirect()->route('xemlichlamviec',compact('thoigian'));
    }
    public function changelichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $thanhvien2 = $request->input('idthanhvien');
        $lichlamviec3 = DB::table('lichlamviec')
            ->where('idquan',$thanhvien->idquan)
            ->where('idcalam', $request->idcalam)
            ->where('idkhuvuc',$request->idkhuvuc)
            ->where('thoigian',$request->thoigian)
            ->get();
        foreach ($lichlamviec3 as $key2 => $row2){
            if($thanhvien2!=null){
                foreach ($thanhvien2 as $key => $row){
                    DB::table('lichlamviec')
                        ->where('idquan',$thanhvien->idquan)
                        ->where('idcalam', $request->idcalam)
                        ->where('idkhuvuc',$request->idkhuvuc)
                        ->where('thoigian',$request->thoigian)
                        ->where('idthanhvien',$row)
                        ->delete();
                }
            }
        }
        $thoigian = $request->thoigian;
        return redirect()->route('xemlichlamviec',compact('thoigian'));
    }
    public function copylichlamviec(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $tungay = $request->tungay;
        $sangngay = $request->sangngay;
        $lichlamviec = DB::table('lichlamviec')
            ->where('idquan',$thanhvien->idquan)
            ->where('thoigian',$tungay)
            ->get();
       foreach ($lichlamviec as $key => $row){
           $lichlamviec2['idquan'] = $row->idquan;
           $lichlamviec2['idkhuvuc'] = $row->idkhuvuc;
           $lichlamviec2['idcalam'] = $row->idcalam;
           $lichlamviec2['idthanhvien'] = $row->idthanhvien;
           $lichlamviec2['thoigian'] = $sangngay;
           $lichlamviec2['diemdanh'] = 0;
           DB::table('lichlamviec')->insert($lichlamviec2);
       }
       return back();
    }
}
