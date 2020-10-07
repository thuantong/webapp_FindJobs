<?php

namespace App\Http\Controllers\BaiViet;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\NganhNghe;
use App\Models\NhaTuyenDung;
//use Carbon\Carbon;
use App\Models\TaiKhoan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaiVietController extends Controller
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
//        dd($this->kiemTraSoDu());
        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name','asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->orderBy('name','asc')->get();
        $data['chuc_vu'] = ChucVu::query()->orderBy('name','asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name','asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name','asc')->get();
        return view('BaiViet.index',compact('data'));
    }

    public function savePost(Request $request){
//        $nhaTuyenDung = NhaTuyenDung::query()->find(Auth::user()->id);
//        return $request;
        $title ="Thêm mới";
        try {
            $baiViet = new BaiTuyenDung();
            $baiViet->tieu_de = $request->tieu_de_bai_dang;//
//        công ty tuyển

            $baiViet->ten_chuc_vu = $request->ten_chuc_vu;//
            $baiViet->so_luong_tuyen = $request->so_luong_tuyen;//
            $baiViet->kinh_nghiem = $request->so_kinh_nghiem;//
            $baiViet->han_tuyen = Carbon::createFromFormat('d/m/Y',$request->han_tuyen_dung)->format('Y-m-d');//
//ngành nghề
            $baiViet->luong = serialize($request->muc_luong);

            $baiViet->gioi_tinh_tuyen = $request->gioi_tinh;//

            $baiViet->mo_ta = $request->mo_ta_cong_viec;//
            $baiViet->quyen_loi = $request->quyen_loi_cong_viec;//
            $baiViet->yeu_cau_cong_viec = $request->yeu_cau_cong_viec;//
            $baiViet->dia_chi = $request->dia_chi_cong_viec;//
            $baiViet->tuoi = $request->dia_chi_cong_viec;//
            $baiViet->bang_cap_id = $request->bang_cap;//
            $baiViet->chuc_vu_id = $request->chuc_vu_tuyen;//
            $baiViet->dia_diem_id = $request->dia_diem_lam_viec;//
            $baiViet->kieu_lam_viec_id = $request->hinh_thuc;//
            $baiViet->tuoi = serialize($request->do_tuoi);//
            $baiViet->cong_ty_id = $request->cong_ty_tuyen_dung;//

        $this->nhaTuyenDung->getBaiViet()->save($baiViet);


//        $baiViet->yeu_cau_ho_so = $request->;
//        $baiViet->ky_nang_basic = $request->;
//        $baiViet->status = $request->;
//        $baiViet->isHot = $request->;
            return $this->getResponse($title,200,'Thêm mới bài viết thành công!');

        }catch (\Exception $e){
            return $this->getResponse($title,400,$e->getMessage());
        }catch (InvalidArgumentException $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }catch (QueryException  $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }

    }
    public function kiemTraSoDu(){
        $laySoDu = $this->nhaTuyenDung->getSoDu;
        return $laySoDu;
    }
    public function ghiHoaDon(){

    }

    //
}
