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

class quanlyvaitroController extends Controller
{
    public function quanlyvaitro(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $vaitro = DB::table('vaitro')
                    ->where('vaitro.idquan', $thanhvien->idquan)
                    ->get();

        $thanhvien2 = DB::table('thanhvien')
                    ->where('idquan',$thanhvien->idquan)
                    ->get();

        $sudung = null;

        return view('vaitro.quanlyvaitro', compact('thanhvien','vaitro','thanhvien2','sudung'));
    }

    public function addvaitro(){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $quyen = DB::table('quyen')
                    ->get();

        return view('vaitro.addvaitro',compact('thanhvien','quyen'));
    }

    public function doaddvaitro(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $check = DB::table('vaitro')
                ->where('idquan', $thanhvien->idquan)
                ->where('tenvaitro',$request->tenvaitro)
                ->first();
        if($check){
            return back()->withErrors(['Tên vai trò đã được dùng']);
        }
        else{
            $vaitro['idquan'] = $thanhvien->idquan;
            $vaitro['tenvaitro'] = $request->tenvaitro;
            $id = DB::table('vaitro')->insertGetID($vaitro);
            $quyen = $request->input('idquyen');
            foreach ($quyen as $key => $row){
                $vaitro_quyen['idvaitro'] = $id;
                $vaitro_quyen['idquyen'] = $row;
                DB::table('vaitro_quyen')->insert($vaitro_quyen);
            }
            return back();
        }
    }
    public function editvaitro($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        $vaitro = DB::table('vaitro')
            ->where('id',$id)
            ->first();
        $quyen = DB::table('quyen')
                    ->get();
        $vaitro_quyen = DB::table('vaitro_quyen')
            ->where('idvaitro',$id)
            ->get();

        return view('vaitro.editvaitro',compact('thanhvien','vaitro','quyen','vaitro_quyen'));
    }

    public function doeditvaitro(Request $request){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
                    ->where('thanhvien.id',$ssidthanhvien)
                    ->join('quan', 'thanhvien.idquan', '=', 'quan.id')
                    ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
                    ->first();

        DB::table('vaitro_quyen')
            ->where('idvaitro',$request->id)
            ->delete();

        $quyen = $request->input('idquyen');
        foreach ($quyen as $key => $row){
            $vaitro_quyen['idvaitro'] = $request->id;
            $vaitro_quyen['idquyen'] = $row;
            DB::table('vaitro_quyen')->insert($vaitro_quyen);
        }
        return back();
    }

    public function deletevaitro($id){
        $ssidthanhvien = Session::get('ssidthanhvien');

        $thanhvien = DB::table('thanhvien')
            ->where('thanhvien.id',$ssidthanhvien)
            ->join('quan','thanhvien.idquan','=','quan.id')
            ->select('thanhvien.*','quan.hinhquan','quan.tenquan')
            ->first();

        DB::table('vaitro_quyen')
            ->where('idvaitro',$id)
            ->delete();   
        DB::table('vaitro')
            ->where('id',$id)
            ->where('idquan',$thanhvien->idquan)
            ->delete();
        
        return back();
    }
}
