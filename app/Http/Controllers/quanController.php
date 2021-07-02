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

class quanController extends Controller
{
    // use StorageImageTrait;
    public function dangkyquan(){
        return view('quan.dangkyquan');
    }
    public function dodangkyquan(Request $request){
        $quan['accquan'] = $request->accquan;
        $pwdquan = md5($request->pwdquan);
        $quan['pwdquan'] = $pwdquan;
        $quan['tenquan'] = $request->tenquan;
        $hinhquan = $request->file('hinhquan')->store('public/hinhanh');
        $linkhinhquan = 'storage'.substr($hinhquan, 6);
        $quan['hinhquan'] = $linkhinhquan;
        $quan['diachiquan'] = $request->diachiquan;
        $quan['website'] = $request->website;
        $quan['sdtquan'] = $request->sdtquan;
        $quan['ngaythanhlap'] = $request->ngaythanhlap;
        $check = DB::table('quan')
                ->where('accquan',$request->accquan)
                ->first();
        if($check){
            return back()->withErrors(['Tài khoản đã tồn tại']);
        }
        else{
            DB::table('quan')->insert($quan);
            return redirect()->route('dangnhapquan');
        }
    }
    public function dangnhapquan(){
        return view('quan.dangnhapquan');
    }
    public function dodangnhapquan(Request $request){
        $accquan = $request->accquan;
        $pwdquan = md5($request->pwdquan);
        $check = DB::table('quan')
                ->where('accquan',$accquan)
                ->where('pwdquan',$pwdquan)
                ->first();
        if($check){
            Session::forget('ssidthanhvien');
            $ssidquan = $check->id;
            Session::put('ssidquan', $ssidquan);
            return redirect()->route('thongtinquan');
        }
        else{
            return back()->withErrors('Tài khoản hoặc mật khẩu không chính xác');
        } 
    }
    public function thongtinquan(){
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();
        return view('quan.thongtinquan',compact('quan'));
    }
    public function dangxuatquan(){
        Session::forget('ssidquan');
        return redirect()->route('dangnhapquan');
    }
    public function suathongtinquan(Request $request){
        $ssidquan = Session::get('ssidquan');
        $quan['tenquan'] = $request->tenquan;
        if($request->file('hinhquan')!= null){
            $hinhquan = $request->file('hinhquan')->store('public/hinhanh');
            $linkhinhquan = 'storage'.substr($hinhquan, 6);
            $quan['hinhquan'] = $linkhinhquan;
        }
        $quan['diachiquan'] = $request->diachiquan;
        $quan['website'] = $request->website;
        $quan['sdtquan'] = $request->sdtquan;
        DB::table('quan')
            ->where('id',$ssidquan)   
            ->update($quan);     
        return back();
    }
    public function doimatkhauquan(Request $request){
        $ssidquan = Session::get('ssidquan');
        $check = DB::table('quan')
                ->where('id',$ssidquan)
                ->first();
        if($check->pwdquan === md5($request->opwdquan)){
            $quan['pwdquan'] = md5($request->rnpwdquan);
            DB::table('quan')
                ->where('id',$ssidquan)
                ->update($quan);
            return back();
        }
        else{
            return back()->withErrors('Mật khẩu sai');
        }
    }
}
