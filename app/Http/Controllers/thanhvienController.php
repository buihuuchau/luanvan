<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class thanhvienController extends Controller
{
    public function quanlythanhvien(){
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id',$ssidquan)
                ->first();
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.idquan', $ssidquan)
                    ->join('vaitro', 'thanhvien.idvaitro', '=', 'vaitro.id')
                    ->select('thanhvien.*','vaitro.*')
                    ->get();
        return view('thanhvien.quanlythanhvien', compact('quan','thanhvien'));
    }
    public function addthanhvien(){
        $ssidquan = Session::get('ssidquan');
        $vaitro = DB::table('vaitro')
                ->where('idquan',$ssidquan)
                ->get();
        return view('thanhvien.addthanhvien', compact('vaitro'));
    }
    public function doaddthanhvien(Request $request){
        $ssidquan = Session::get('ssidquan');
        $thanhvien = array();
        $thanhvien['idquan'] = $ssidquan;
        $thanhvien['acc'] = $request->acc;
        $pwd = md5($request->pwd);
        $thanhvien['pwd'] = $pwd;
        $thanhvien['hoten'] = $request->hoten;
        $hinhtv = $request->file('hinhtv')->store('public/hinhanh');
        $linkhinhtv = 'storage'.substr($hinhtv, 6);
        $thanhvien['hinhtv'] = $linkhinhtv;
        $thanhvien['namsinh'] = $request->namsinh;
        $thanhvien['sex'] = $request->sex;
        $thanhvien['diachi'] = $request->diachi;
        $thanhvien['sdt'] = $request->sdt;
        $thanhvien['ngayvaolam'] = $request->ngayvaolam;
        $thanhvien['luong'] = $request->luong;
        $thanhvien['idvaitro'] = $request->idvaitro;
        $check = DB::table('thanhvien')
                ->where('acc',$request->acc)
                ->first();
        if($check){
            return back()->withErrors(['Tài khoản đã tồn tại']);
        }
        else{
            DB::table('thanhvien')->insert($thanhvien);
            return redirect()->route('dangnhapthanhvien');
        }
    }
    public function dangnhapthanhvien(){
        return view('thanhvien.dangnhapthanhvien');
    }
    public function dodangnhapthanhvien(Request $request){
        $acc = $request->acc;
        $pwd = md5($request->pwd);
        $check = DB::table('thanhvien')
                ->where('acc',$acc)
                ->where('pwd',$pwd)
                ->first();
        if($check){
            Session::forget('ssidquan');
            $ssidthanhvien = $check->id;
            Session::put('ssidthanhvien', $ssidthanhvien);
            return redirect()->route('thongtinthanhvien');
        }
        else{
            return back()->withErrors('Tài khoản hoặc mật khẩu không chính xác');
        } 
    }
    public function thongtinthanhvien(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id', $ssidthanhvien)
                    ->join('quan','thanhvien.idquan', '=', 'quan.id')
                    ->join('vaitro','thanhvien.idvaitro', '=', 'vaitro.id')
                    ->select('thanhvien.*','quan.*','vaitro.*')
                    ->first();
        return view('thanhvien.thongtinthanhvien',compact('thanhvien'));
    }
    public function dangxuatthanhvien(){
        Session::forget('ssidthanhvien');
        return redirect()->route('dangnhapthanhvien');
    }
    public function suathongtinthanhvien(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien['hoten'] = $request->hoten;
        if($request->file('hinhtv')!=null){
            $hinhtv = $request->file('hinhtv')->store('public/hinhanh');
            $linkhinhtv = 'storage'.substr($hinhtv, 6);
            $thanhvien['hinhtv'] = $linkhinhtv;
        }
        $thanhvien['namsinh'] = $request->namsinh;
        $thanhvien['sex'] = $request->sex;
        $thanhvien['diachi'] = $request->diachi;
        $thanhvien['sdt'] = $request->sdt;
        DB::table('thanhvien')
            ->where('id',$ssidthanhvien)
            ->update($thanhvien);
        return back();
    }
    public function doimatkhau(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $check = DB::table('thanhvien')
                ->where('id',$ssidthanhvien)
                ->first();
        if($check->pwd === md5($request->opwd)){
            $thanhvien['pwd'] = md5($request->rnpwd);
            DB::table('thanhvien')
                ->where('id',$ssidthanhvien)
                ->update($thanhvien);
            return back();
        }
        else{
            return back()->withErrors('Mật khẩu sai');
        }
    }
}
