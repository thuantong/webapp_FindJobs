<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyTaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('Admin.QuanLyTaiKhoan.index');
    }
    public function getDanhSachTaiKhoan(){
        $data = TaiKhoan::query()->find(Auth::user()->id)->getPhanQuyen()->get()->toArray();
        dd($data);
    }
}
