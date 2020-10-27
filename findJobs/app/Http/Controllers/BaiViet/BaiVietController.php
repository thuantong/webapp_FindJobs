<?php

namespace App\Http\Controllers\BaiViet;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\ChucVu;
use App\Models\CongTy;
use App\Models\DiaDiem;
use App\Models\DonHang;
use App\Models\DonXinViec;
use App\Models\DuyetBai;
use App\Models\HangMucThanhToan;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\NganhNghe;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
//use Carbon\Carbon;
use App\Models\TaiKhoan;
use App\Models\Thich;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cknow\Money\Money;

class BaiVietController extends Controller
{
    private $nhaTuyenDung;
    private $tienDangTin;
    private $hangMucThanhToan;
    private $baiViet;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
            $this->hangMucThanhToan = HangMucThanhToan::query()->find('1');
            $this->tienDangTin = $this->hangMucThanhToan->first()->gia;//1 xu 1 ngày

            return $next($request);
        });

    }

    public function getTienDangTin()
    {
        return $this->tienDangTin;
    }

    public function getSoDu()
    {
        return $this->nhaTuyenDung->getSoDu;
    }

    public function index()
    {
//        $dataCheck = array(
//            'ten_chuc_nang' =>$chucNang,
//            'href'=>route();
//        );
        $checkSoDu = $this->checkDangKySoDu('Đăng bài tuyển dụng', '/dang-bai-viet');
//                dd($checkSoDu);
        if ($checkSoDu['status'] == 400) {
//            dd($checkSoDu);
            return view('SoDu.index', compact('checkSoDu'));
        }
//        dd(json_encode(Money::VND(5000.00)));
//        dd(number_format(, 0));
//        dd($this->kiemTraSoDu());
        $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();
        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->orderBy('created_at', 'desc')->get();
        $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
        return view('BaiViet.index', compact('data'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function savePost(Request $request)
    {
//        $nhaTuyenDung = NhaTuyenDung::query()->find(Auth::user()->id);
//        return $request;
        $title = "Thêm mới";
        try {
            $baiViet = new BaiTuyenDung();
            $baiViet->tieu_de = $request->tieu_de_bai_dang;//
//        công ty tuyển

            $baiViet->ten_chuc_vu = $request->ten_chuc_vu;//
            $baiViet->so_luong_tuyen = $request->so_luong_tuyen;//
            $baiViet->kinh_nghiem_id = $request->so_kinh_nghiem;//
            $baiViet->han_tuyen = Carbon::createFromFormat('d/m/Y', $request->han_tuyen_dung)->format('Y-m-d');//
//ngành nghề
            $baiViet->luong = serialize($request->muc_luong);

            $baiViet->gioi_tinh_tuyen = $request->gioi_tinh;//

            $baiViet->mo_ta = $request->mo_ta_cong_viec;//
            $baiViet->quyen_loi = $request->quyen_loi_cong_viec;//
            $baiViet->yeu_cau_cong_viec = $request->yeu_cau_cong_viec;//
            $baiViet->dia_chi = $request->dia_chi_cong_viec;//
            $baiViet->tuoi = serialize($request->do_tuoi);//
            $nganh_nghe = $request->nganh_nghe;//

            $baiViet->bang_cap_id = $request->bang_cap;//
            $baiViet->chuc_vu_id = $request->chuc_vu_tuyen;//
            $baiViet->dia_diem_id = $request->dia_diem_lam_viec;//
            $baiViet->kieu_lam_viec_id = $request->hinh_thuc;//
            $baiViet->cong_ty_id = $request->cong_ty_tuyen_dung;//

//            return $this->tienDangTin * $request->so_ngay_ton_tai;
            if ($this->kiemTraSoDu($this->tienDangTin * $request->so_ngay_ton_tai) == false) {
                return $this->getResponse('Nạp thêm xu', 405, 'Số dư của bạn hiện không đủ xu!');
            }

            $this->nhaTuyenDung->getBaiViet()->save($baiViet);

            $this->baiViet = $baiViet;
            $this->baiViet->getNganhNghe()->attach($nganh_nghe);

            $this->luuVaoDuyetTin($this->baiViet);
            $this->ghiHoaDon($this->tienDangTin * $request->so_ngay_ton_tai, $request->so_ngay_ton_tai);
//        $baiViet->yeu_cau_ho_so = $request->;
//        $baiViet->ky_nang_basic = $request->;
//        $baiViet->status = $request->;
//        $baiViet->isHot = $request->;
            return $this->getResponse($title, 200, 'Thêm mới bài viết thành công!');

        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }
//        catch (InvalidArgumentException $e) {
//            return $this->getResponse($title,400,$e->getMessage());
//        }catch (QueryException  $e) {
//            return $this->getResponse($title,400,$e->getMessage());
//        }

    }

    /**
     * kiểm tra số dư
     * @param $tienDangTin
     * @return bool
     */
    public function kiemTraSoDu($tienDangTin)
    {
        $laySoDu = $this->getSoDu();
        if ($tienDangTin > $laySoDu['tong_tien']) {
            return false;
        } else {
            $this->capNhatSoDu($tienDangTin);
            return true;
        }

    }

    /**
     * cập nhấy số dư
     * @param $tienDangTin
     * @return array
     */
    public function capNhatSoDu($tienDangTin)
    {
        try {
            $soDu = $this->getSoDu()->tong_tien;
            $soTienThuc = $soDu - $tienDangTin;
            $this->getSoDu()->tong_tien = $soTienThuc;
            $this->getSoDu()->save();
            Session::put('so_du', $this->getSoDu()->tong_tien);
        } catch (\Exception $e) {
            return $this->getResponse('Cập nhật số dư', 400, $e->getMessage());
        }

    }

    /**
     * ghi hóa đơn
     * @param $tienDangTin
     * @param $soNgayDangTin
     * @return array
     */
    public function ghiHoaDon($tienDangTin, $soNgayDangTin)
    {
        try {
            $donHang = new DonHang();
            $donHang->so_luong = $soNgayDangTin;
            $donHang->tong_tien = $tienDangTin;
            $this->hangMucThanhToan->getDonHang()->save($donHang);
            $this->nhaTuyenDung->getDonHang()->save($donHang);
            $this->baiViet->getDonHang()->save($donHang);
        } catch (\Exception $e) {
            return $this->getResponse('Ghi hóa đơn', 400, $e->getMessage());
        }

    }

    public function luuVaoDuyetTin($baiViet)
    {
        try {
            $duyetTin = new DuyetBai();
            $duyetTin->status = 0;//chưa đọc
            $baiViet->getDuyetTin()->save($duyetTin);
        } catch (\Exception $e) {
            return $this->getResponse('Lưu duyệt tin', 400, $e->getMessage());

        }
    }
    public function getViewNopDon(Request $request){
        $post = $request->get('id');
        $data = BaiTuyenDung::query()->with('getNhaTuyenDung','getNganhNghe','getCongTy','getChucVu','getKieuLamViec','getDiaDiem','getBangCap','getKinhNghiem')->find($post)->toArray();
        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
        $data['luong'] = unserialize($data['luong']);
        $data['tuoi'] = unserialize($data['tuoi']);
        $data['tieu_de'] = ucwords($data['tieu_de']);
        $data['bai_da_thich']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getBaiThich->pluck('id')->toArray();
        $data['bai_da_thich']['total'] = Thich::query()->where('bai_tuyen_dung_id',$post)->count();
        $data['cong_ty_nganh_nghe'] = CongTy::query()->find($data['cong_ty_id'])->getNganhNghe()->get()->toArray();
        $data['quy_mo_nhan_su'] = CongTy::query()->find($data['cong_ty_id'])->getQuyMoNhanSu()->get()->toArray();
        $data['quy_mo_nhan_su'] = $data['quy_mo_nhan_su'][0];

        $data['don_xin_viec']['total'] = DonXinViec::query()->where('bai_tuyen_dung_id',$post)->count();
        $data['don_xin_viec']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getDonXinViec()->get()->pluck('id')->toArray();

        $nguoiTimViec = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->get()->toArray();
        $data['nguoi_tim_viec'] = $nguoiTimViec[0];
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);

        return view('NopDon.modal.content',compact('data'));
    }

    public function getThongTinBaiViet($post,$detail){
//        $data['nop_don_type'] = 0;
        $data = BaiTuyenDung::query()->with('getNhaTuyenDung','getNganhNghe','getCongTy','getChucVu','getKieuLamViec','getDiaDiem','getBangCap','getKinhNghiem')->find($post)->toArray();
        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
        $data['luong'] = unserialize($data['luong']);
        $data['tuoi'] = unserialize($data['tuoi']);
        $data['tieu_de'] = ucwords($data['tieu_de']);
        $data['bai_da_thich']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getBaiThich->pluck('id')->toArray();
        $data['bai_da_thich']['total'] = Thich::query()->where('bai_tuyen_dung_id',$post)->count();
        $data['cong_ty_nganh_nghe'] = CongTy::query()->find($data['cong_ty_id'])->getNganhNghe()->get()->toArray();
        $data['quy_mo_nhan_su'] = CongTy::query()->find($data['cong_ty_id'])->getQuyMoNhanSu()->get()->toArray();
        $data['quy_mo_nhan_su'] = $data['quy_mo_nhan_su'][0];

        $data['don_xin_viec']['total'] = DonXinViec::query()->where('bai_tuyen_dung_id',$post)->count();
        $data['don_xin_viec']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getDonXinViec()->get()->pluck('id')->toArray();

        $nguoiTimViec = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->get()->toArray();
        $data['nguoi_tim_viec'] = $nguoiTimViec[0];
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
//        dd($nguoiTimViec);
//        dd(Auth::user()->id);
//        dd($nguoiTimViec);
//        dd($data);
        switch (intval($detail)){
            case 0:
                return $data;
            case 1:
//                dd($nguoiTimViec);
                return view('BaiViet.chiTiet',compact('data','nguoiTimViec'));
        }
//        return $data;
    }

    public function likePost(Request $request){
        try {
            $idPost = $request->get('id');
//            dd($idPost);
            $status = intval($request->get('thich'));
            $nguoiLike = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->get();
            $baiTuyenDung = BaiTuyenDung::query()->find($idPost);
            switch ($status){
                case 0:
                    $baiTuyenDung->getBaiThich()->detach($nguoiLike);
                    break;
                case 1:
                    $baiTuyenDung->getBaiThich()->attach($nguoiLike);
                    break;
            }
            $data['total_thich'] = Thich::query()->where('bai_tuyen_dung_id',$idPost)->count();
//dd($nguoiLike);
            return $data;
//            $baiTuyenDung = BaiTuyenDung::query()->find($id);
//            $baiTuyenDung->
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
}
