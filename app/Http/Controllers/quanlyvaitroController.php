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
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();

        $vaitro = DB::table('vaitro')
                    ->where('vaitro.idquan', $ssidquan)
                    ->get();

        $thanhvien2 = DB::table('thanhvien')
                    ->where('idquan',$ssidquan)
                    ->get();

        $sudung = null;

        return view('vaitro.quanlyvaitro', compact('quan','vaitro','thanhvien2','sudung'));
    }

    public function addvaitro(){
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();

        $quyen = DB::table('quyen')
                    ->get();

        return view('vaitro.addvaitro',compact('quan','quyen'));
    }

    public function doaddvaitro(Request $request){
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();

        $check = DB::table('vaitro')
                ->where('idquan', $ssidquan)
                ->where('tenvaitro',$request->tenvaitro)
                ->first();
        if($check){
            return back()->withErrors(['Tên vai trò đã được dùng']);
        }
        else{
            $vaitro['idquan'] = $ssidquan;
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
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();

        $vaitro = DB::table('vaitro')
            ->where('id',$id)
            ->first();
        $quyen = DB::table('quyen')
                    ->get();
        $vaitro_quyen = DB::table('vaitro_quyen')
            ->where('idvaitro',$id)
            ->get();

        return view('vaitro.editvaitro',compact('quan','vaitro','quyen','vaitro_quyen'));
    }

    public function doeditvaitro(Request $request){
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
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
        $ssidquan = Session::get('ssidquan');
        $quan = DB::table('quan')
                ->where('id', $ssidquan)
                ->first();

        DB::table('vaitro_quyen')
            ->where('idvaitro',$id)
            ->delete();   
        DB::table('vaitro')
            ->where('id',$id)
            ->where('idquan',$ssidquan)
            ->delete();
        
        return back();
    }
}
