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

class quanlynguyenlieuController extends Controller
{
    public function quanlynguyenlieu(){
        $ssidthanhvien = Session::get('ssidthanhvien');
        
        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        $nguyenlieu = DB::table('nguyenlieu')
                ->where('idquan',$thanhvien->idquan)
                ->get();
        $kho = DB::table('kho')
                ->where('idquan',$thanhvien->idquan)
                ->get();
        $sudung = null;

        return view('nguyenlieu.quanlynguyenlieu',compact('thanhvien','nguyenlieu','kho','sudung'));
    }

    // public function addnguyenlieu(){
    //     $ssidthanhvien = Session::get('ssidthanhvien');

    //     $thanhvien = DB::table('thanhvien')
    //         ->where('thanhvien.id',$ssidthanhvien)
    //         ->join('quan','thanhvien.idquan','=','quan.id')
    //         ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
    //         ->first();
    //     return view('nguyenlieu.addnguyenlieu',compact('thanhvien'));
    // }

    public function doaddnguyenlieu(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('nguyenlieu')
            ->where('idquan',$thanhvien->idquan)
            ->where('tennguyenlieu', $request->tennguyenlieu)
            ->where('xuatxu',$request->xuatxu)
            ->first();
        if($check){
            return back()->withErrors(['Nguyên liệu đã tồn tại']);
        }
        else{
            $nguyenlieu['idquan'] = $thanhvien->idquan;
            $nguyenlieu['tennguyenlieu'] = $request->tennguyenlieu;
            $nguyenlieu['xuatxu'] = $request->xuatxu;
            $nguyenlieu['donvitinh'] = $request->donvitinh;
            DB::table('nguyenlieu')->insert($nguyenlieu);
            return back();
        }       
        
    }

    public function editnguyenlieu($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        $nguyenlieu = DB::table('nguyenlieu')
            ->where('id',$id)
            ->first();
                
        return view('nguyenlieu.editnguyenlieu',compact('thanhvien','nguyenlieu'));
    }

    public function doeditnguyenlieu(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();
        
        $check = DB::table('nguyenlieu')
            ->where('idquan',$thanhvien->idquan)
            ->where('tennguyenlieu',$request->tennguyenlieu)
            ->where('xuatxu',$request->xuatxu)
            ->where('donvitinh',$request->donvitinh)
            ->first();
        if($check){
            return back()->withErrors(['Nguyên liệu đã tồn tại']);
        }
        else{
            $nguyenlieu['tennguyenlieu'] = $request->tennguyenlieu;
            $nguyenlieu['xuatxu'] = $request->xuatxu;
            $nguyenlieu['donvitinh'] = $request->donvitinh;
            $nguyenlieu = DB::table('nguyenlieu')
                ->where('id',$request->id)
                ->update($nguyenlieu);
            return redirect()->route('quanlynguyenlieu');
        }
    }

    public function hiddennguyenlieu($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $nguyenlieu['hidden'] = 1;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('nguyenlieu')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($nguyenlieu);
        
        return back();
    }
    public function shownguyenlieu($id){
        $ssidthanhvien = Session::get('ssidthanhvien');
        $nguyenlieu['hidden'] = 0;

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('nguyenlieu')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->update($nguyenlieu);
        
        return back();
    }

    public function deletenguyenlieu($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('nguyenlieu')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
