<?php

namespace App\Http\Controllers\NopDon;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NopDonController extends Controller
{
    private $nguoiTimViec;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;
            return $next($request);
        });
    }

    public function nopDonUngTuyen(Request $request){
        $title = 'Nộp đơn ứng tuyển';
        try {
            $check = $request->check;

            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);

            $taiKhoan->ho_ten = $request->ho_ten;
            $taiKhoan->phone = $request->so_dien_thoai;
            $taiKhoan->save();

            $id = $request->id_bai_viet;
            $this->nguoiTimViec->gioi_tinh = $request->gioi_tinh;
            $this->nguoiTimViec->ngay_sinh = $request->ngay_sinh;
            $this->nguoiTimViec->dia_chi = $request->dia_chi;
            $this->nguoiTimViec->exp_lam_viec = serialize($request->kinh_nghiem);
            $this->nguoiTimViec->projects = serialize($request->projects);

            $this->nguoiTimViec->save();
            $this->capNhatDonXinViec($this->nguoiTimViec,$id);
            return $this->getResponse($title,200,'Nộp đơn ứng tuyển thành công');
        }catch (\Exception $exception){
            return $this->getResponse($title,400,$exception->getMessage());
        }
    }

    public function capNhatDonXinViec($nguoiTimViec,$idBaiTuyenDung){
        try {
            $baiTuyenDung = BaiTuyenDung::query()->find($idBaiTuyenDung)->getDonXinViec()->attach($nguoiTimViec);
            return $baiTuyenDung;
        }catch (\Exception $e){
            return $this->getResponse('Cập nhật đơn xin việc',400,$e->getMessage());
        }
    }
}
