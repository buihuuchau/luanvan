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
    Route::get('/', [
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
});
// QUAN LY QUAN

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