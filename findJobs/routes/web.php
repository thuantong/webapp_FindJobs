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

Route::namespace('Auth')->group(function (){
    Route::name('auth.')->group(function (){
//        Route::resource('/login', 'TrangChuController');
        Route::get('/dang-nhap','MyLoginController@showLoginForm')->name('form.login');
        Route::post('/go-login','MyLoginController@login')->name('login');
        Route::post('/logout','MyLoginController@logout')->name('logout');

        Route::get('/dang-ky','RegisterController@showRegistrationForm')->name('form.register');
        Route::post('/go-dang-ky','RegisterController@register')->name('register');
    });
});

Route::namespace('TrangChu')->group(function () {
    Route::name('trangchu.')->group(function () {
        Route::resource('/', 'TrangChuController');
        Route::get('/search', 'TrangChuController@searchInput');
        Route::get('/chi-tiet-tuyen-dung', 'TrangChuController@details')->name('chiTietBaiDang');
        Route::get('/create-post', 'TrangChuController@create')->name('create');
        Route::get('/update-post{id}', 'TrangChuController@update')->name('update');
        Route::get('/delete-post{id}', 'TrangChuController@delete')->name('delete');
//        Route::get('/logout', 'TrangChuController@logout')->name('logout');
    });

});

Route::namespace('User')->group(function () {
    Route::name('user.')->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/nguoi-tim-viec', 'UserController@getEmployee')->name('nguoiTimViec');
//        Route::get('/user-employer', 'UserController@getEmployer');
        Route::get('/user-set-employer', 'UserController@setEmployee');
        Route::get('/user-set-employer', 'UserController@setEmployer');
        Route::post('/user-set-avatar', 'UserController@setAvatar');
        Route::post('/doi-mat-khau', 'UserController@doiMatKhauNtv')->name('doiMatKhau');
        Route::get('/user-skill-view','UserController@getViewSkill');
        Route::get('/user-skill-view-append','UserController@getViewSkillAppend');
        //nguoi tim viec
        Route::get('/nguoi-tim-viec/project-view','UserController@projectView')->name('projectView');
        Route::get('/nguoi-tim-viec/project-view/get-exp-html','UserController@getHtmlExp');
        Route::post('/nguoi-tim-viec/update','UserController@setNguoiTimViec');

        Route::get('/nha-tuyen-dung','UserController@getEmployer')->name('nhaTuyendung');
        Route::post('/nha-tuyen-dung/set-logo-company','UserController@setLogoCongTy')->name('setLogoCongTy');
        Route::get('/nha-tuyen-dung/confirm-email','UserController@confirmEmailNhaTuyenDung')->name('nhaTuyenDung.confirmEmail');
        Route::post('/nha-tuyen-dung/update','UserController@updateNhaTuyenDung')->name('nhaTuyenDung.update');
    });
});

Route::namespace('BaiViet')->group(function (){
    Route::name('baiviet.')->group(function (){
        Route::resource('/dang-bai-viet','BaiVietController');
    });
});

Route::namespace('CongTy')->group(function (){
    Route::name('congty.')->group(function (){
        Route::get('/danh-sach-cong-ty','CongTyController@index')->name('index');
        Route::get('/danh-sach-cong-ty/data','CongTyController@getDanhSach')->name('getdanhsach');
    });
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('PhanQuyen')->group(function () {
    Route::name('phanquyen.')->group(function () {
        Route::resource('/phan-quyen', 'PhanQuyenController');
        Route::post('/phan-quyen-setter', 'PhanQuyenController@setPhanQuyen')->name('setter');
    });

});

//Route::get('/khong-tim-thay-trang','ErrorController@func404')->name('notFoundRoute');
