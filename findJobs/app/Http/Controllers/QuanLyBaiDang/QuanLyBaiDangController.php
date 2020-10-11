<?php

namespace App\Http\Controllers\QuanLyBaiDang;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyBaiDangController extends Controller
{
    private $nhaTuyenDung;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
            return $next($request);
        });
    }

    public function index(){
        return view('QuanLyTuyenDung.QLBaiDang.index');
    }
    public function getDanhSach(){
        $data['data'] = BaiTuyenDung::with('getChucVu','getKieuLamViec','getNhaTuyenDung','getCongTy','getDiaDiem','getBangCap','getNganhNghe')->get();
//        $data = $this->nhaTuyenDung->with('getBaiViet')->get();
        $index = 0;
//        dd(json_decode($data));
//        foreach ($data['get_bai_viet'] as $row){
//            $layThem[$index] = $row->with('getCongTy')->get();
//        }
        return $data;
    }
}
