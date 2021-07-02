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

class quanlycalamController extends Controller
{
    public function quanlycalam(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $calam = DB::table('calam')
                ->where('idquan',$thanhvien->idquan)
                ->get();
        $lichlamviec = DB::table('lichlamviec')
                ->where('idquan',$thanhvien->idquan)
                ->get();
        $sudung = null;

        return view('calam.quanlycalam',compact('thanhvien','calam','lichlamviec','sudung'));
    }

    public function addcalam(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        return view('calam.addcalam',compact('thanhvien'));
    }

    public function doaddcalam(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->where('tencalam', $request->tencalam)
            ->first();
        if($check){
            return back()->withErrors(['Ca làm đã tồn tại']);
        }
        else{
            $calam['idquan'] = $thanhvien->idquan;
            $calam['tencalam'] = $request->tencalam;
            $calam['tu'] = $request->tu;
            $calam['den'] = $request->den;
            DB::table('calam')->insert($calam);
            return back();
        }       
        
    }

    public function editcalam($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $calam = DB::table('calam')
            ->where('id',$id)
            ->first();
                
        return view('calam.editcalam',compact('thanhvien','calam'));
    }

    public function doeditcalam(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('calam')
            ->where('idquan',$thanhvien->idquan)
            ->where('tencalam',$request->tencalam)
            ->where('tu',$request->tu)
            ->where('den',$request->den)
            ->first();
        if($check){
            return back()->withErrors(['Ca làm đã tồn tại']);
        }
        else{
            $calam['tencalam'] = $request->tencalam;
            $calam['tu'] = $request->tu;
            $calam['den'] = $request->den;
            $calam = DB::table('calam')
                ->where('id',$request->id)
                ->update($calam);
            return redirect()->route('quanlycalam');
        }
    }

    public function hiddencalam($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $calam['hidden'] = 1;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('calam')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($calam);
        
        return back();
    }
    public function showcalam($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $calam['hidden'] = 0;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('calam')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($calam);
        
        return back();
    }

    public function deletecalam($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('calam')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
