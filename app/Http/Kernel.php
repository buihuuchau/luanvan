<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ////////////////////////////////////////////////////////////////////////////////////////////////
        // 1 Ban
        'XemBan' => \App\Http\Middleware\XemBan::class,
        'ThemBan' => \App\Http\Middleware\ThemBan::class,
        'SuaBan' => \App\Http\Middleware\SuaBan::class,
        'XoaBan' => \App\Http\Middleware\XoaBan::class,
        // 2 Calam
        'XemCalam' => \App\Http\Middleware\XemCalam::class,
        'ThemCalam' => \App\Http\Middleware\ThemCalam::class,
        'SuaCalam' => \App\Http\Middleware\SuaCalam::class,
        'XoaCalam' => \App\Http\Middleware\XoaCalam::class,
        // 3 Hoadon
        'XemHoadon' => \App\Http\Middleware\XemHoadon::class,
        'ThemHoadon' => \App\Http\Middleware\ThemHoadon::class,
        'SuaHoadon' => \App\Http\Middleware\SuaHoadon::class,
        'XoaHoadon' => \App\Http\Middleware\XoaHoadon::class,
        // 4 Khachhang
        'XemKhachhang' => \App\Http\Middleware\XemKhachhang::class,
        'ThemKhachhang' => \App\Http\Middleware\ThemKhachhang::class,
        'SuaKhachhang' => \App\Http\Middleware\SuaKhachhang::class,
        'XoaKhachhang' => \App\Http\Middleware\XoaKhachhang::class,
        // 5 Kho
        'XemKho' => \App\Http\Middleware\XemKho::class,
        'ThemKho' => \App\Http\Middleware\ThemKho::class,
        'SuaKho' => \App\Http\Middleware\SuaKho::class,
        'XoaKho' => \App\Http\Middleware\XoaKho::class,
        // 6 Khuvuc
        'XemKhuvuc' => \App\Http\Middleware\XemKhuvuc::class,
        'ThemKhuvuc' => \App\Http\Middleware\ThemKhuvuc::class,
        'SuaKhuvuc' => \App\Http\Middleware\SuaKhuvuc::class,
        'XoaKhuvuc' => \App\Http\Middleware\XoaKhuvuc::class,
        // 7 Lichlamviec
        'XemLichlamviec' => \App\Http\Middleware\XemLichlamviec::class,
        'ThemLichlamviec' => \App\Http\Middleware\ThemLichlamviec::class,
        'SuaLichlamviec' => \App\Http\Middleware\SuaLichlamviec::class,
        'XoaLichlamviec' => \App\Http\Middleware\XoaLichlamviec::class,
        // 8 Nguyenlieu
        'XemNguyenlieu' => \App\Http\Middleware\XemNguyenlieu::class,
        'ThemNguyenlieu' => \App\Http\Middleware\ThemNguyenlieu::class,
        'SuaNguyenlieu' => \App\Http\Middleware\SuaNguyenlieu::class,
        'XoaNguyenlieu' => \App\Http\Middleware\XoaNguyenlieu::class,
        // 9 Quan
        'XemQuan' => \App\Http\Middleware\XemQuan::class,
        'ThemQuan' => \App\Http\Middleware\ThemQuan::class,
        'SuaQuan' => \App\Http\Middleware\SuaQuan::class,
        'XoaQuan' => \App\Http\Middleware\XoaQuan::class,
        // 10 Thanhvien
        'XemThanhvien' => \App\Http\Middleware\XemThanhvien::class,
        'ThemThanhvien' => \App\Http\Middleware\ThemThanhvien::class,
        'SuaThanhvien' => \App\Http\Middleware\SuaThanhvien::class,
        'XoaThanhvien' => \App\Http\Middleware\XoaThanhvien::class,
        // 11 Thucdon
        'XemThucdon' => \App\Http\Middleware\XemThucdon::class,
        'ThemThucdon' => \App\Http\Middleware\ThemThucdon::class,
        'SuaThucdon' => \App\Http\Middleware\SuaThucdon::class,
        'XoaThucdon' => \App\Http\Middleware\XoaThucdon::class,
        // 12 Vaitro
        'XemVaitro' => \App\Http\Middleware\XemVaitro::class,
        'ThemVaitro' => \App\Http\Middleware\ThemVaitro::class,
        'SuaVaitro' => \App\Http\Middleware\SuaVaitro::class,
        'XoaVaitro' => \App\Http\Middleware\XoaVaitro::class,
        // 13 Quanly
        'Quanlyngansach' => \App\Http\Middleware\Quanlyngansach::class,
        'Quanlynhaphang' => \App\Http\Middleware\Quanlynhaphang::class,
        'Quanlybanhang' => \App\Http\Middleware\Quanlybanhang::class,
        'Quanlyluongnhanvien' => \App\Http\Middleware\Quanlyluongnhanvien::class,
        ////////////////////////////////////////////////////////////////////////////////////////////////
    ];
}
