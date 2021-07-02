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
        'uses' => 'App\Http\Controllers\thanhvienController@quanlythanhvien'
    ]);
    Route::get('/addthanhvien', [
        'as' => 'addthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@addthanhvien'
    ]);
    Route::post('/doaddthanhvien', [
        'as' => 'doaddthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@doaddthanhvien'
    ]);
    Route::get('/editthongtinthanhvien/{id}', [
        'as' => 'editthongtinthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@editthongtinthanhvien'
    ]);
    Route::post('/doeditthongtinthanhvien', [
        'as' => 'doeditthongtinthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@doeditthongtinthanhvien'
    ]);
    Route::get('/deletethongtinthanhvien/{id}', [
        'as' => 'deletethongtinthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@deletethongtinthanhvien'
    ]);
    Route::get('/', [
        'as' => 'dangnhapthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@dangnhapthanhvien'
    ]);
    Route::post('/dodangnhapthanhvien', [
        'as' => 'dodangnhapthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@dodangnhapthanhvien'
    ]);
    Route::get('/thongtinthanhvien', [
        'as' => 'thongtinthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@thongtinthanhvien'
    ]);
    Route::get('/dangxuatthanhvien', [
        'as' => 'dangxuatthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@dangxuatthanhvien'
    ]);       
    Route::post('/suathongtinthanhvien', [
        'as' => 'suathongtinthanhvien',
        'uses' => 'App\Http\Controllers\thanhvienController@suathongtinthanhvien'
    ]);
    Route::post('/doimatkhau', [
        'as' => 'doimatkhau',
        'uses' => 'App\Http\Controllers\thanhvienController@doimatkhau'
    ]);
});
// QUAN LY THANH VIEN

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