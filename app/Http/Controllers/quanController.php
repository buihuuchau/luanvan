<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class quanController extends Controller
{
    // use StorageImageTrait;
    public function dangkyquan(){
        return view('login.dangkyquan');
    }
    public function dodangkyquan(Request $request){
        $quan = array();
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
            return '<script type="text/javascript">alert("Tài khoản đã tồn tại");</script>';
        }
        else{
            DB::table('quan')->insert($quan);
            return back();
        }
    }
    public function dangnhapquan(){
        return view('login.dangnhapquan');
    }
    public function dodangnhapquan(Request $request){
        $accquan = $request->accquan;
        $pwdquan = md5($request->pwdquan);
        $check = DB::table('quan')
                ->where('accquan',$accquan)
                ->where('pwdquan',$pwdquan)
                ->first();
        if($check){
            $id = $check->id;
            Session::put('idquan', $id);
            return redirect(route('thongtinquan'));
        }
        else{
            return back();
        } 
    }
    public function dangxuatquan(){
        Session::forget('idquan');
        return view('login.dangnhapquan');
    }
    public function thongtinquan(){
        $id = Session::get('idquan');
        $quan = DB::table('quan')
                ->where('id', $id)
                ->first();
        return view('login.thongtinquan',compact('quan'));
    }
    public function suathongtinquan(Request $request){
        $id = Session::get('idquan');
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
            ->where('id',$id)   
            ->update($quan);     
        return back();
    }
    public function doimatkhauquan(Request $request){
        $id = Session::get('idquan');
        $check = DB::table('quan')
                ->where('id',$id)
                ->first();
        if($check->pwdquan === md5($request->opwdquan)){
            $quan['pwdquan'] = md5($request->rnpwdquan);
            DB::table('quan')
                ->where('id',$id)
                ->update($quan);
            return back();
        }
        else{
            return '<script type="text/javascript">alert("Mật khẩu sai");</script>'; 
        }
    }
}
