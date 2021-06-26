<?php

namespace App\Http\Controllers;
use DB;
// use App\Traits\StorageImageTrait;
Use Alert;
use Illuminate\Support\Facades\Redirect;
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
        $quan['hinhquan'] = $hinhquan;
        $quan['diachiquan'] = $request->diachiquan;
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
        $data = DB::table('quan')
                ->where('accquan',$accquan)
                ->where('pwdquan',$pwdquan)
                ->first();
        if($data){
            echo "co taikhoan";
        }
        else{echo "tai khoan sai";}
        // return view('login.thongtinquan');
    }
}
