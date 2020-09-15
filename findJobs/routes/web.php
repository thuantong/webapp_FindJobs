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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::namespace('TrangChu')->group(function (){
    Route::name('trangchu.')->group(function (){
        Route::resource('/','TrangChuController');
        Route::get('/search','TrangChuController@searchInput');
        Route::get('/chi-tiet-tuyen-dung','TrangChuController@details')->name('chiTietBaiDang');
        Route::get('/create-post','TrangChuController@create')->name('create');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
