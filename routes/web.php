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
});
// QUAN LY BAN