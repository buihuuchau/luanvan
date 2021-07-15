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

class quanlythucdonController extends Controller
{
    public function quanlythucdon(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $thucdon = DB::table('thucdon')
                    ->where('thucdon.idquan', $thanhvien->idquan)
                    ->get();

        $chitiet = DB::table('chitiet')
                    ->get();
        $sudung = null;

        return view('thucdon.quanlythucdon', compact('thanhvien','thucdon','chitiet','sudung'));
    }

    // public function addthucdon(){
    //     $ssidthanhvien = Session::get('ssidthanhvien');

    //     $thanhvien = DB::table('thanhvien')
    //                 ->where('thanhvien.id',$ssidthanhvien)
    //                 ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
    //                 ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
    //                 ->first();

    //     return view('thucdon.addthucdon',compact('thanhvien'));
    // }

    public function doaddthucdon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $check = DB::table('thucdon')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('tenmon', $request->tenmon)
                    ->first();
        if($check){
            return back()->withErrors(['Món đã tồn tại']);
        }
        else{
            $thucdon['idquan'] = $thanhvien->idquan;
            $thucdon['loaimon'] = $request->loaimon;
            $thucdon['tenmon'] = $request->tenmon;
            $thucdon['dongia'] = $request->dongia;
            $hinhmon = $request->file('hinhmon')->store('public/hinhanh');
            $linkhinhmon = 'storage'.substr($hinhmon, 6);
            $thucdon['hinhmon'] = $linkhinhmon;
            $thucdon['mota'] = $request->mota;
            DB::table('thucdon')->insert($thucdon);
            return back();
        }
    }
    public function editthucdon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $thucdon = DB::table('thucdon')
                ->where('id',$id)
                ->first();
        
        return view('thucdon.editthucdon',compact('thanhvien','thucdon'));
    }

    public function doeditthucdon(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        
        $check = DB::table('thucdon')
                    ->where('idquan', $thanhvien->idquan)
                    ->where('tenmon', $request->tenmon)
                    ->where('loaimon',$request->loaimon)
                    ->where('dongia',$request->dongia)
                    ->where('mota',$request->mota)
                    ->first();
        if($check){
            return back()->withErrors(['Món đã tồn tại']);
        }
        else{
            $thucdon['loaimon'] = $request->loaimon;
            $thucdon['tenmon'] = $request->tenmon;
            $thucdon['dongia'] = $request->dongia;
            if($request->file('hinhmon')!=null){
                $hinhmon = $request->file('hinhmon')->store('public/hinhanh');
                $linkhinhmon = 'storage'.substr($hinhmon, 6);
                $thucdon['hinhmon'] = $linkhinhmon;
            }
            $thucdon['mota'] = $request->mota;
            DB::table('thucdon')
            ->where('id',$request->id)
            ->update($thucdon);
            return back();
        }
    }

    public function hiddenthucdon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thucdon['hidden'] = 1;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('thucdon')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($thucdon);
        
        return back();
    }
    public function showthucdon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thucdon['hidden'] = 0;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('thucdon')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($thucdon);
        
        return back();
    }

    public function deletethucdon($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('thucdon')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
