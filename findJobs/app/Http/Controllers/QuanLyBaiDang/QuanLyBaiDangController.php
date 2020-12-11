<?php

namespace App\Http\Controllers\QuanLyBaiDang;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\NganhNghe;
use App\Models\QuyMoNhanSu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyBaiDangController extends Controller
{
    private $nhaTuyenDung;
    public function __construct()
    {
        $this->middleware(['auth','email.confirm','nha_tuyen_dung']);
        $this->middleware(function ($request, $next) {
            $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
            return $next($request);
        });
    }

    public function index(){
        $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();
        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->orderBy('created_at', 'desc')->first()->toArray();
        $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
        $data['bang_cap'] = BangCap::query()->orderBy('name', 'asc')->get();
        $data['quy_mo_nhan_su'] = QuyMoNhanSu::query()->orderBy('id', 'asc')->get();
//        dd($data);
        return view('QuanLyTuyenDung.QLBaiDang.index',compact('data'));
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
