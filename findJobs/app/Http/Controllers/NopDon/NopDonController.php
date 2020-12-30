<?php

namespace App\Http\Controllers\NopDon;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\DonXinViec;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NopDonController extends Controller
{
    private $nguoiTimViec;

    public function __construct()
    {
        $this->middleware(['auth', 'email.confirm', 'nguoi_tim_viec']);
        $this->middleware(function ($request, $next) {
            $this->nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;
            return $next($request);
        });
    }

    /**
     * người tìm việc : view danh sách bài viết đã ứng tuyển
     */
    public function danhSachBaiDaNopDon()
    {
        return view('User.nguoiTimViec.danhSachDaUngTuyen');
    }

    public function layDanhSachBaiDaNopDon()
    {
        $query = BaiTuyenDung::query()
            ->select(['bai_tuyen_dung.*', 'tai_khoan.ho_ten as nha_tuyen_dung_name', 'cong_ty.name as cong_ty_name', 'don_xin_viec.status as don_xin_viec_status'])
            ->leftJoin('nha_tuyen_dung', 'nha_tuyen_dung.id', '=', 'bai_tuyen_dung.nha_tuyen_dung_id')
            ->leftJoin('tai_khoan', 'tai_khoan.id', '=', 'nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('cong_ty', 'cong_ty.id', '=', 'bai_tuyen_dung.cong_ty_id')
            ->leftJoin('don_xin_viec', 'bai_tuyen_dung.id', '=', 'don_xin_viec.bai_tuyen_dung_id')
            ->where('don_xin_viec.nguoi_tim_viec_id', $this->nguoiTimViec['id'])
            ->get()->toArray();
        $data['data'] = $query;
        return $data;
        dd($query);
    }

    /**
     * Chức năng nộp đơn ứng tuyển của người tìm việc
     */
    public function nopDonUngTuyen(Request $request)
    {
        $title = 'Nộp đơn ứng tuyển';
        try {
//            $check = $request->check;

            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);

            $taiKhoan->ho_ten = $request->ho_ten;
            $taiKhoan->phone = $request->so_dien_thoai;
            $taiKhoan->save();

            $id = $request->id_bai_viet;
            $this->nguoiTimViec->gioi_tinh = $request->gioi_tinh;
            $this->nguoiTimViec->ngay_sinh = Carbon::createFromFormat('d/m/Y',$request->ngay_sinh)->format('Y-m-d');
            $this->nguoiTimViec->dia_chi = $request->dia_chi;
            $this->nguoiTimViec->exp_lam_viec = serialize($request->kinh_nghiem);
            $this->nguoiTimViec->projects = serialize($request->projects);

            $this->nguoiTimViec->save();
//            $baiTuyenDungIds = $this->nguoiTimViec->getDonXinViec->pluck('id')->toArray();
            if ($this->capNhatDonXinViec($this->nguoiTimViec, $id) == false) {
                return $this->getResponse($title, 401, 'Bạn đã ứng tuyển bài viết này rồi');
            }

            return $this->getResponse($title, 200, 'Nộp đơn ứng tuyển thành công');


        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, $exception->getMessage());
        }
    }

    public function capNhatDonXinViec($nguoiTimViec, $idBaiTuyenDung)
    {
        try {
            $donTimViec = DonXinViec::query()->where('bai_tuyen_dung_id', $idBaiTuyenDung)->where('nguoi_tim_viec_id', $nguoiTimViec->id)->first();
            if ($donTimViec != null) {
                return false;
            }
            $donXinViec = new DonXinViec();
            $donXinViec->bai_tuyen_dung_id = $idBaiTuyenDung;
            $donXinViec->nguoi_tim_viec_id = $nguoiTimViec->id;
            $donXinViec->file = null;
            $donXinViec->status = 0;
            $donXinViec->save();
            return true;
        } catch (\Exception $e) {
            return $this->getResponse('Cập nhật đơn xin việc', 400, $e->getMessage());
        }
    }
}
