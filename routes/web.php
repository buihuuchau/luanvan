<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('login.dangkyquan');
// });
// QUAN LY QUANn
Route::prefix('/')->group(function () {
    Route::get('/dangkyquan', [
        'as' => 'dangkyquan',
        'uses' => 'App\Http\Controllers\quanController@dangkyquan'
    ]);
    Route::post('/dodangkyquan', [
        'as' => 'dodangkyquan',
        'uses' => 'App\Http\Controllers\quanController@dodangkyquan'
    ]);
    Route::get('/dangnhapquan', [
        'as' => 'dangnhapquan',
        'uses' => 'App\Http\Controllers\quanController@dangnhapquan'
    ]);
    Route::post('/dodangnhapquan', [
        'as' => 'dodangnhapquan',
        'uses' => 'App\Http\Controllers\quanController@dodangnhapquan'
    ]);
    Route::get('/thongtinquan', [
        'as' => 'thongtinquan',
        'uses' => 'App\Http\Controllers\quanController@thongtinquan'
    ]);
    Route::get('/dangxuatquan', [
        'as' => 'dangxuatquan',
        'uses' => 'App\Http\Controllers\quanController@dangxuatquan'
    ]);
    Route::post('/suathongtinquan', [
        'as' => 'suathongtinquan',
        'uses' => 'App\Http\Controllers\quanController@suathongtinquan'
    ]);
    Route::post('/doimatkhauquan', [
        'as' => 'doimatkhauquan',
        'uses' => 'App\Http\Controllers\quanController@doimatkhauquan'
    ]);
});
// QUAN LY QUAN

// QUAN LY THANH VIEN
Route::prefix('/')->group(function () {
    Route::get('/quanlythanhvien', [
        'as' => 'quanlythanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@quanlythanhvien'
    ]);
    Route::get('/addthanhvien', [
        'as' => 'addthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@addthanhvien'
    ]);
    Route::post('/doaddthanhvien', [
        'as' => 'doaddthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@doaddthanhvien'
    ]);
    Route::get('/editthongtinthanhvien/{id}', [
        'as' => 'editthongtinthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@editthongtinthanhvien'
    ]);
    Route::post('/doeditthongtinthanhvien', [
        'as' => 'doeditthongtinthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@doeditthongtinthanhvien'
    ]);
    Route::post('/editmatkhau', [
        'as' => 'editmatkhau',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@editmatkhau'
    ]);
    Route::get('/kichhoatthanhvien/{id}', [
        'as' => 'kichhoatthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@kichhoatthanhvien'
    ]);
    Route::get('/vohieuhoathanhvien/{id}', [
        'as' => 'vohieuhoathanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@vohieuhoathanhvien'
    ]);
    Route::get('/deletethongtinthanhvien/{id}', [
        'as' => 'deletethongtinthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@deletethongtinthanhvien'
    ]);


    Route::get('/', [
        'as' => 'dangnhapthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@dangnhapthanhvien'
    ]);
    Route::post('/dodangnhapthanhvien', [
        'as' => 'dodangnhapthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@dodangnhapthanhvien'
    ]);
    Route::get('/thongtinthanhvien', [
        'as' => 'thongtinthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@thongtinthanhvien'
    ]);
    Route::get('/dangxuatthanhvien', [
        'as' => 'dangxuatthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@dangxuatthanhvien'
    ]);
    Route::post('/suathongtinthanhvien', [
        'as' => 'suathongtinthanhvien',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@suathongtinthanhvien'
    ]);
    Route::post('/doimatkhau', [
        'as' => 'doimatkhau',
        'uses' => 'App\Http\Controllers\quanlythanhvienController@doimatkhau'
    ]);
});
// QUAN LY THANH VIEN

// QUAN LY KHACH HANG
Route::prefix('/')->group(function () {
    Route::get('/quanlykhachhang', [
        'as' => 'quanlykhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@quanlykhachhang',
        'middleware' => 'XemKhachhang::class'
    ]);
    // Route::get('/addkhachhang', [
    //     'as' => 'addkhachhang',
    //     'uses' => 'App\Http\Controllers\quanlykhachhangController@addkhachhang'
    // ]);
    Route::post('/doaddkhachhang', [
        'as' => 'doaddkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@doaddkhachhang',
        'middleware' => 'ThemKhachhang::class'
    ]);
    Route::get('/editkhachhang/{id}', [
        'as' => 'editkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@editkhachhang',
        'middleware' => 'SuaKhachhang::class'
    ]);
    Route::post('/doeditkhachhang', [
        'as' => 'doeditkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@doeditkhachhang',
        'middleware' => 'SuaKhachhang::class'
    ]);
});
// QUAN LY KHACH HANG

// QUAN LY KHU VUC
Route::prefix('/')->group(function () {
    Route::get('/quanlykhuvuc', [
        'as' => 'quanlykhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@quanlykhuvuc',
        'middleware' => 'XemKhuvuc::class'
    ]);
    // Route::get('/addkhuvuc', [
    //     'as' => 'addkhuvuc',
    //     'uses' => 'App\Http\Controllers\quanlykhuvucController@addkhuvuc'
    // ]);
    Route::post('/doaddkhuvuc', [
        'as' => 'doaddkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@doaddkhuvuc',
        'middleware' => 'ThemKhuvuc::class'
    ]);
    Route::get('/editkhuvuc/{id}', [
        'as' => 'editkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@editkhuvuc',
        'middleware' => 'SuaKhuvuc::class'
    ]);
    Route::post('/doeditkhuvuc', [
        'as' => 'doeditkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@doeditkhuvuc',
        'middleware' => 'SuaKhuvuc::class'
    ]);
    Route::get('/hiddenkhuvuc/{id}', [
        'as' => 'hiddenkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@hiddenkhuvuc',
        'middleware' => 'SuaKhuvuc::class'
    ]);
    Route::get('/showkhuvuc/{id}', [
        'as' => 'showkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@showkhuvuc',
        'middleware' => 'SuaKhuvuc::class'
    ]);
    Route::get('/deletekhuvuc/{id}', [
        'as' => 'deletekhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@deletekhuvuc',
        'middleware' => 'XoaKhuvuc::class'
    ]);
});
// QUAN LY KHU VUC

// QUAN LY BAN
Route::prefix('/')->group(function () {
    Route::get('/quanlyban', [
        'as' => 'quanlyban',
        'uses' => 'App\Http\Controllers\quanlybanController@quanlyban',
        'middleware' => 'XemBan::class'
    ]);
    // Route::get('/addban', [
    //     'as' => 'addban',
    //     'uses' => 'App\Http\Controllers\quanlybanController@addban'
    // ]);
    Route::post('/doaddban', [
        'as' => 'doaddban',
        'uses' => 'App\Http\Controllers\quanlybanController@doaddban',
        'middleware' => 'ThemBan::class'
    ]);
    Route::get('/editban/{id}', [
        'as' => 'editban',
        'uses' => 'App\Http\Controllers\quanlybanController@editban',
        'middleware' => 'SuaBan::class'
    ]);
    Route::post('/doeditban', [
        'as' => 'doeditban',
        'uses' => 'App\Http\Controllers\quanlybanController@doeditban',
        'middleware' => 'SuaBan::class'
    ]);
    Route::get('/hiddenban/{id}', [
        'as' => 'hiddenban',
        'uses' => 'App\Http\Controllers\quanlybanController@hiddenban',
        'middleware' => 'SuaBan::class'
    ]);
    Route::get('/showban/{id}', [
        'as' => 'showban',
        'uses' => 'App\Http\Controllers\quanlybanController@showban',
        'middleware' => 'SuaBan::class'
    ]);
    Route::get('/deleteban/{id}', [
        'as' => 'deleteban',
        'uses' => 'App\Http\Controllers\quanlybanController@deleteban',
        'middleware' => 'XoaBan::class'
    ]);
});
// QUAN LY BAN

// QUAN LY NGUYEN LIEU
Route::prefix('/')->group(function () {
    Route::get('/quanlynguyenlieu', [
        'as' => 'quanlynguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@quanlynguyenlieu',
        'middleware' => 'XemNguyenlieu::class'
    ]);
    // Route::get('/addnguyenlieu', [
    //     'as' => 'addnguyenlieu',
    //     'uses' => 'App\Http\Controllers\quanlynguyenlieuController@addnguyenlieu'
    // ]);
    Route::post('/doaddnguyenlieu', [
        'as' => 'doaddnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@doaddnguyenlieu',
        'middleware' => 'ThemNguyenlieu::class'
    ]);
    Route::get('/editnguyenlieu/{id}', [
        'as' => 'editnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@editnguyenlieu',
        'middleware' => 'SuaNguyenlieu::class'
    ]);
    Route::post('/doeditnguyenlieu', [
        'as' => 'doeditnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@doeditnguyenlieu',
        'middleware' => 'SuaNguyenlieu::class'
    ]);
    Route::get('/hiddennguyenlieu/{id}', [
        'as' => 'hiddennguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@hiddennguyenlieu',
        'middleware' => 'SuaNguyenlieu::class'
    ]);
    Route::get('/shownguyenlieu/{id}', [
        'as' => 'shownguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@shownguyenlieu',
        'middleware' => 'SuaNguyenlieu::class'
    ]);
    Route::get('/deletenguyenlieu/{id}', [
        'as' => 'deletenguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@deletenguyenlieu',
        'middleware' => 'XoaNguyenlieu::class'
    ]);
});
// QUAN LY NGUYEN LIEU

// QUAN LY KHO
Route::prefix('/')->group(function () {
    Route::get('/quanlykho', [
        'as' => 'quanlykho',
        'uses' => 'App\Http\Controllers\quanlykhoController@quanlykho',
        'middleware' => 'XemKho::class'
    ]);
    // Route::get('/addkho', [
    //     'as' => 'addkho',
    //     'uses' => 'App\Http\Controllers\quanlykhoController@addkho'
    // ]);
    Route::post('/doaddkho', [
        'as' => 'doaddkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@doaddkho',
        'middleware' => 'ThemKho::class'
    ]);
    Route::get('/hethangkho/{id}', [
        'as' => 'hethangkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@hethangkho',
        'middleware' => 'SuaKho::class'
    ]);
    Route::get('/conhangkho/{id}', [
        'as' => 'conhangkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@conhangkho',
        'middleware' => 'SuaKho::class'
    ]);
    Route::get('/deletekho/{id}', [
        'as' => 'deletekho',
        'uses' => 'App\Http\Controllers\quanlykhoController@deletekho',
        'middleware' => 'XoaKho::class'
    ]);
});
// QUAN LY KHO

// QUAN LY CA LAM
Route::prefix('/')->group(function () {
    Route::get('/quanlycalam', [
        'as' => 'quanlycalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@quanlycalam',
        'middleware' => 'XemCalam::class'
    ]);
    // Route::get('/addcalam', [
    //     'as' => 'addcalam',
    //     'uses' => 'App\Http\Controllers\quanlycalamController@addcalam'
    // ]);
    Route::post('/doaddcalam', [
        'as' => 'doaddcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@doaddcalam',
        'middleware' => 'ThemCalam::class'
    ]);
    Route::get('/editcalam/{id}', [
        'as' => 'editcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@editcalam',
        'middleware' => 'SuaCalam::class'
    ]);
    Route::post('/doeditcalam', [
        'as' => 'doeditcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@doeditcalam',
        'middleware' => 'SuaCalam::class'
    ]);
    Route::get('/hiddencalam/{id}', [
        'as' => 'hiddencalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@hiddencalam',
        'middleware' => 'SuaCalam::class'
    ]);
    Route::get('/showcalam/{id}', [
        'as' => 'showcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@showcalam',
        'middleware' => 'SuaCalam::class'
    ]);
    Route::get('/deletecalam/{id}', [
        'as' => 'deletecalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@deletecalam',
        'middleware' => 'XoaCalam::class'
    ]);
});
// QUAN LY CA LAM

// QUAN LY LICH LAM VIEC
Route::prefix('/')->group(function () {
    Route::get('/quanlylichlamviec', [
        'as' => 'quanlylichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@quanlylichlamviec',
        'middleware' => 'XemLichlamviec::class'
    ]);
    Route::get('/xemlichlamviec', [
        'as' => 'xemlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@xemlichlamviec',
        'middleware' => 'XemLichlamviec::class'
    ]);
    Route::get('/diemdanhcomatlichlamviec/{id}', [
        'as' => 'diemdanhcomatlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@diemdanhcomatlichlamviec',
        'middleware' => 'SuaLichlamviec::class'
    ]);
    Route::get('/diemdanhvangmatlichlamviec/{id}', [
        'as' => 'diemdanhvangmatlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@diemdanhvangmatlichlamviec',
        'middleware' => 'SuaLichlamviec::class'
    ]);
    Route::get('/editlichlamviec', [
        'as' => 'editlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@editlichlamviec',
        'middleware' => 'ThemLichlamviec::class'
    ]);
    Route::get('/addlichlamviec', [
        'as' => 'addlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@addlichlamviec',
        'middleware' => 'ThemLichlamviec::class'
    ]);
    Route::get('/changelichlamviec', [
        'as' => 'changelichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@changelichlamviec',
        'middleware' => 'XoaLichlamviec::class'
    ]);
    Route::get('/copylichlamviec', [
        'as' => 'copylichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@copylichlamviec',
        'middleware' => 'SuaLichlamviec::class'
    ]);
});
// QUAN LY LICH LAM VIEC

//QUAN LY VAI TRO
Route::prefix('/')->group(function () {
    Route::get('/quanlyvaitro', [
        'as' => 'quanlyvaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@quanlyvaitro'
    ]);
    Route::get('/addvaitro', [
        'as' => 'addvaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@addvaitro'
    ]);
    Route::post('/doaddvaitro', [
        'as' => 'doaddvaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@doaddvaitro'
    ]);
    Route::get('/editvaitro/{id}', [
        'as' => 'editvaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@editvaitro'
    ]);
    Route::post('/doeditvaitro', [
        'as' => 'doeditvaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@doeditvaitro'
    ]);
    Route::get('/deletevaitro/{id}', [
        'as' => 'deletevaitro',
        'uses' => 'App\Http\Controllers\quanlyvaitroController@deletevaitro'
    ]);
});
//QUAN LY VAI TRO

// QUAN LY THUC DON
Route::prefix('/')->group(function () {
    Route::get('/quanlythucdon', [
        'as' => 'quanlythucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@quanlythucdon',
        'middleware' => 'XemThucdon::class'
    ]);
    // Route::get('/addthucdon', [
    //     'as' => 'addthucdon',
    //     'uses' => 'App\Http\Controllers\quanlythucdonController@addthucdon'
    // ]);
    Route::post('/doaddthucdon', [
        'as' => 'doaddthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@doaddthucdon',
        'middleware' => 'ThemThucdon::class'
    ]);
    Route::get('/editthucdon/{id}', [
        'as' => 'editthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@editthucdon',
        'middleware' => 'SuaThucdon::class'
    ]);
    Route::post('/doeditthucdon', [
        'as' => 'doeditthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@doeditthucdon',
        'middleware' => 'SuaThucdon::class'
    ]);
    Route::get('/hiddenthucdon/{id}', [
        'as' => 'hiddenthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@hiddenthucdon',
        'middleware' => 'SuaThucdon::class'
    ]);
    Route::get('/showthucdon/{id}', [
        'as' => 'showthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@showthucdon',
        'middleware' => 'SuaThucdon::class'
    ]);
    Route::get('/deletethucdon/{id}', [
        'as' => 'deletethucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@deletethucdon',
        'middleware' => 'XoaThucDon::class'
    ]);
});
// QUAN LY THUC DON

// DAT BAN / DAT MON
Route::prefix('/')->group(function () {
    Route::get('/hoadon', [
        'as' => 'hoadon',
        'uses' => 'App\Http\Controllers\orderController@hoadon',
        'middleware' => 'XemHoadon::class'
    ]);
    Route::get('/xemban', [
        'as' => 'xemban',
        'uses' => 'App\Http\Controllers\orderController@xemban',
        'middleware' => 'XemHoadon::class'
    ]);



    Route::get('/taohoadon', [
        'as' => 'taohoadon',
        'uses' => 'App\Http\Controllers\orderController@taohoadon',
        'middleware' => 'ThemHoadon::class'
    ]);
    Route::get('/deletehoadon/{id}', [
        'as' => 'deletehoadon',
        'uses' => 'App\Http\Controllers\orderController@deletehoadon',
        'middleware' => 'XoaHoadon::class'
    ]);



    Route::get('/doibanhoadon/{id}', [ //idban
        'as' => 'doibanhoadon',
        'uses' => 'App\Http\Controllers\orderController@doibanhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/doikhuvuchoadon', [
        'as' => 'doikhuvuchoadon',
        'uses' => 'App\Http\Controllers\orderController@doikhuvuchoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/dodoibanhoadon', [
        'as' => 'dodoibanhoadon',
        'uses' => 'App\Http\Controllers\orderController@dodoibanhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);



    Route::get('/doimonhoadon/{id}', [ //idban
        'as' => 'doimonhoadon',
        'uses' => 'App\Http\Controllers\orderController@doimonhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/datmon', [
        'as' => 'datmon',
        'uses' => 'App\Http\Controllers\orderController@datmon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/xoamonhoadon', [ //idchitiet
        'as' => 'xoamonhoadon',
        'uses' => 'App\Http\Controllers\orderController@xoamonhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/doisoluongmonhoadon', [
        'as' => 'doisoluongmonhoadon',
        'uses' => 'App\Http\Controllers\orderController@doisoluongmonhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);



    Route::get('/tamtinhhoadon/{id}', [ //idban
        'as' => 'tamtinhhoadon',
        'uses' => 'App\Http\Controllers\orderController@tamtinhhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::get('/giamgia', [
        'as' => 'giamgia',
        'uses' => 'App\Http\Controllers\orderController@giamgia',
        'middleware' => 'SuaHoadon::class'
    ]);
    Route::post('/thanhtoanhoadon', [
        'as' => 'thanhtoanhoadon',
        'uses' => 'App\Http\Controllers\orderController@thanhtoanhoadon',
        'middleware' => 'SuaHoadon::class'
    ]);
});
// DAT BAN / DAT MON

// QUAN LY CHE BIEN
Route::prefix('/')->group(function () {
    Route::get('/quanlychebien', [
        'as' => 'quanlychebien',
        'uses' => 'App\Http\Controllers\quanlychebienController@quanlychebien',
        'middleware' => 'XemNguyenlieu::class'
    ]);
    Route::get('/checkhoanthanh/{id}', [
        'as' => 'checkhoanthanh',
        'uses' => 'App\Http\Controllers\quanlychebienController@checkhoanthanh',
        'middleware' => 'XemNguyenlieu::class'
    ]);
    Route::get('/baohuy/{id}', [
        'as' => 'baohuy',
        'uses' => 'App\Http\Controllers\quanlychebienController@baohuy',
        'middleware' => 'XemNguyenlieu::class'
    ]);
    Route::get('/baohetnguyenlieu', [
        'as' => 'baohetnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlychebienController@baohetnguyenlieu',
        'middleware' => 'XemNguyenlieu::class'
    ]);
    Route::get('/dobaohetnguyenlieu/{id}', [
        'as' => 'dobaohetnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlychebienController@dobaohetnguyenlieu',
        'middleware' => 'XemNguyenlieu::class'
    ]);
});
// QUAN LY CHE BIEN

// QUAN LY HOA DON
Route::prefix('/')->group(function () {
    Route::get('/quanlyhoadon', [
        'as' => 'quanlyhoadon',
        'uses' => 'App\Http\Controllers\quanlyhoadonController@quanlyhoadon',
        'middleware' => 'XemHoadon::class'
    ]);
    Route::get('/xemhoadon/{id}', [
        'as' => 'xemhoadon',
        'uses' => 'App\Http\Controllers\quanlyhoadonController@xemhoadon',
        'middleware' => 'XemHoadon::class'
    ]);
});
// QUAN LY HOA DON

// QUAN LY NGAN SACH
Route::prefix('/')->group(function () {
    Route::get('/quanlyngansach', [
        'as' => 'quanlyngansach',
        'uses' => 'App\Http\Controllers\quanlyngansachController@quanlyngansach',
        'middleware' => 'Quanlyngansach::class'
    ]);
    Route::post('/quanlynhaphang', [
        'as' => 'quanlynhaphang',
        'uses' => 'App\Http\Controllers\quanlyngansachController@quanlynhaphang',
        'middleware' => 'Quanlynhaphang::class'
    ]);
    Route::post('/quanlybanhang', [
        'as' => 'quanlybanhang',
        'uses' => 'App\Http\Controllers\quanlyngansachController@quanlybanhang',
        'middleware' => 'Quanlybanhang::class'
    ]);
    Route::post('/quanlyluong', [
        'as' => 'quanlyluong',
        'uses' => 'App\Http\Controllers\quanlyngansachController@quanlyluong',
        'middleware' => 'Quanlyluongnhanvien::class'
    ]);
    Route::get('/chitietluong', [
        'as' => 'chitietluong',
        'uses' => 'App\Http\Controllers\quanlyngansachController@chitietluong'
    ]);
    Route::get('/xemchitietluong', [
        'as' => 'xemchitietluong',
        'uses' => 'App\Http\Controllers\quanlyngansachController@xemchitietluong'
    ]);
});
// QUAN LY NGAN SACH