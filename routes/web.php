<?php

use Illuminate\Support\Facades\Route;

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
// QUAN LY QUAN
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
        'uses' => 'App\Http\Controllers\quanlykhachhangController@quanlykhachhang'
    ]);
    Route::get('/addkhachhang', [
        'as' => 'addkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@addkhachhang'
    ]);
    Route::post('/doaddkhachhang', [
        'as' => 'doaddkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@doaddkhachhang'
    ]);
    Route::get('/editkhachhang/{id}', [
        'as' => 'editkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@editkhachhang'
    ]);
    Route::post('/doeditkhachhang', [
        'as' => 'doeditkhachhang',
        'uses' => 'App\Http\Controllers\quanlykhachhangController@doeditkhachhang'
    ]);
});
// QUAN LY KHACH HANG

// QUAN LY KHU VUC
Route::prefix('/')->group(function () {
    Route::get('/quanlykhuvuc', [
        'as' => 'quanlykhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@quanlykhuvuc'
    ]);
    Route::get('/addkhuvuc', [
        'as' => 'addkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@addkhuvuc'
    ]);
    Route::post('/doaddkhuvuc', [
        'as' => 'doaddkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@doaddkhuvuc'
    ]);
    Route::get('/editkhuvuc/{id}', [
        'as' => 'editkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@editkhuvuc'
    ]);
    Route::post('/doeditkhuvuc', [
        'as' => 'doeditkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@doeditkhuvuc'
    ]);
    Route::get('/hiddenkhuvuc/{id}', [
        'as' => 'hiddenkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@hiddenkhuvuc'
    ]);
    Route::get('/showkhuvuc/{id}', [
        'as' => 'showkhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@showkhuvuc'
    ]);
    Route::get('/deletekhuvuc/{id}', [
        'as' => 'deletekhuvuc',
        'uses' => 'App\Http\Controllers\quanlykhuvucController@deletekhuvuc'
    ]);
});
// QUAN LY KHU VUC

// QUAN LY BAN
Route::prefix('/')->group(function () {
    Route::get('/quanlyban', [
        'as' => 'quanlyban',
        'uses' => 'App\Http\Controllers\quanlybanController@quanlyban'
    ]);
    Route::get('/addban', [
        'as' => 'addban',
        'uses' => 'App\Http\Controllers\quanlybanController@addban'
    ]);
    Route::post('/doaddban', [
        'as' => 'doaddban',
        'uses' => 'App\Http\Controllers\quanlybanController@doaddban'
    ]);
    Route::get('/editban/{id}', [
        'as' => 'editban',
        'uses' => 'App\Http\Controllers\quanlybanController@editban'
    ]);
    Route::post('/doeditban', [
        'as' => 'doeditban',
        'uses' => 'App\Http\Controllers\quanlybanController@doeditban'
    ]);
    Route::get('/hiddenban/{id}', [
        'as' => 'hiddenban',
        'uses' => 'App\Http\Controllers\quanlybanController@hiddenban'
    ]);
    Route::get('/showban/{id}', [
        'as' => 'showban',
        'uses' => 'App\Http\Controllers\quanlybanController@showban'
    ]);
    Route::get('/deleteban/{id}', [
        'as' => 'deleteban',
        'uses' => 'App\Http\Controllers\quanlybanController@deleteban'
    ]);
});
// QUAN LY BAN

// QUAN LY NGUYEN LIEU
Route::prefix('/')->group(function () {
    Route::get('/quanlynguyenlieu', [
        'as' => 'quanlynguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@quanlynguyenlieu'
    ]);
    Route::get('/addnguyenlieu', [
        'as' => 'addnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@addnguyenlieu'
    ]);
    Route::post('/doaddnguyenlieu', [
        'as' => 'doaddnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@doaddnguyenlieu'
    ]);
    Route::get('/editnguyenlieu/{id}', [
        'as' => 'editnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@editnguyenlieu'
    ]);
    Route::post('/doeditnguyenlieu', [
        'as' => 'doeditnguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@doeditnguyenlieu'
    ]);
    Route::get('/hiddennguyenlieu/{id}', [
        'as' => 'hiddennguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@hiddennguyenlieu'
    ]);
    Route::get('/shownguyenlieu/{id}', [
        'as' => 'shownguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@shownguyenlieu'
    ]);
    Route::get('/deletenguyenlieu/{id}', [
        'as' => 'deletenguyenlieu',
        'uses' => 'App\Http\Controllers\quanlynguyenlieuController@deletenguyenlieu'
    ]);
});   
// QUAN LY NGUYEN LIEU

// QUAN LY KHO
Route::prefix('/')->group(function () {
    Route::get('/quanlykho', [
        'as' => 'quanlykho',
        'uses' => 'App\Http\Controllers\quanlykhoController@quanlykho'
    ]);
    Route::get('/addkho', [
        'as' => 'addkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@addkho'
    ]);
    Route::post('/doaddkho', [
        'as' => 'doaddkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@doaddkho'
    ]);
    Route::get('/hethangkho/{id}', [
        'as' => 'hethangkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@hethangkho'
    ]);
    Route::get('/conhangkho/{id}', [
        'as' => 'conhangkho',
        'uses' => 'App\Http\Controllers\quanlykhoController@conhangkho'
    ]);
    Route::get('/deletekho/{id}', [
        'as' => 'deletekho',
        'uses' => 'App\Http\Controllers\quanlykhoController@deletekho'
    ]);
});
// QUAN LY KHO

// QUAN LY CA LAM
Route::prefix('/')->group(function () {
    Route::get('/quanlycalam', [
        'as' => 'quanlycalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@quanlycalam'
    ]);
    Route::get('/addcalam', [
        'as' => 'addcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@addcalam'
    ]);
    Route::post('/doaddcalam', [
        'as' => 'doaddcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@doaddcalam'
    ]);
    Route::get('/editcalam/{id}', [
        'as' => 'editcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@editcalam'
    ]);
    Route::post('/doeditcalam', [
        'as' => 'doeditcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@doeditcalam'
    ]);
    Route::get('/hiddencalam/{id}', [
        'as' => 'hiddencalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@hiddencalam'
    ]);
    Route::get('/showcalam/{id}', [
        'as' => 'showcalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@showcalam'
    ]);
    Route::get('/deletecalam/{id}', [
        'as' => 'deletecalam',
        'uses' => 'App\Http\Controllers\quanlycalamController@deletecalam'
    ]);
});   
// QUAN LY CA LAM

// QUAN LY LICH LAM VIEC
Route::prefix('/')->group(function () {
    Route::get('/quanlylichlamviec', [
        'as' => 'quanlylichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@quanlylichlamviec'
    ]);
    Route::get('/xemlichlamviec', [
        'as' => 'xemlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@xemlichlamviec'
    ]);
    Route::get('/diemdanhcomatlichlamviec/{id}', [
        'as' => 'diemdanhcomatlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@diemdanhcomatlichlamviec'
    ]);
    Route::get('/diemdanhvangmatlichlamviec/{id}', [
        'as' => 'diemdanhvangmatlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@diemdanhvangmatlichlamviec'
    ]);
    Route::get('/editlichlamviec', [
        'as' => 'editlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@editlichlamviec'
    ]);
    Route::get('/addlichlamviec', [
        'as' => 'addlichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@addlichlamviec'
    ]);
    Route::get('/changelichlamviec', [
        'as' => 'changelichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@changelichlamviec'
    ]);
    Route::get('/copylichlamviec', [
        'as' => 'copylichlamviec',
        'uses' => 'App\Http\Controllers\quanlylichlamviecController@copylichlamviec'
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
        'uses' => 'App\Http\Controllers\quanlythucdonController@quanlythucdon'
    ]);
    Route::get('/addthucdon', [
        'as' => 'addthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@addthucdon'
    ]);
    Route::post('/doaddthucdon', [
        'as' => 'doaddthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@doaddthucdon'
    ]);
    Route::get('/editthucdon/{id}', [
        'as' => 'editthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@editthucdon'
    ]);
    Route::post('/doeditthucdon', [
        'as' => 'doeditthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@doeditthucdon'
    ]);
    Route::get('/hiddenthucdon/{id}', [
        'as' => 'hiddenthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@hiddenthucdon'
    ]);
    Route::get('/showthucdon/{id}', [
        'as' => 'showthucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@showthucdon'
    ]);
    Route::get('/deletethucdon/{id}', [
        'as' => 'deletethucdon',
        'uses' => 'App\Http\Controllers\quanlythucdonController@deletethucdon'
    ]);
});
// QUAN LY THUC DON