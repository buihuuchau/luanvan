<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Session;

class XoaThucdon
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ssidthanhvien = Session::get('ssidthanhvien');
        $thanhvien = DB::table('thanhvien')
            ->where('id',$ssidthanhvien)
            ->first();
        $vaitro_quyen = DB::table('vaitro_quyen')
            ->where('idvaitro',$thanhvien->idvaitro)
            ->where('idquyen',44)
            ->first();
        if($vaitro_quyen){
            return $next($request);
        }
        else{
            return back();
        }
    }
}
