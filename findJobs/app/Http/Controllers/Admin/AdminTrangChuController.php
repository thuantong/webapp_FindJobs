<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\CongTy;
use App\Models\DuyetBai;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTrangChuController extends Controller
{
    private $quanTriVien;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->quanTriVien = TaiKhoan::query()->find(Auth::user()->id)->getQuanTriVien;
            return $next($request);
        });
    }

    public function index(){
        $baiDuyet = json_decode(BaiTuyenDung::with('getDuyetTin','getNhaTuyenDung')->get());
//        $baiDuyet = json_decode(CongTy::with('getNhaTuyenDung','getNganhNghe')->get());
//        $data = $baiDuyet['created_at'];
//        dd(json_decode($data));
//        dd($baiDuyet[0]->get_nha_tuyen_dung->id);
//        dd($baiDuyet[0]->get_duyet_tin);
//        dd($baiDuyet[4]['get_nha_tuyen_dung']['id']);
//        dd(json_decode(BaiTuyenDung::with('getDuyetTin','getNhaTuyenDung')->where('status','=',0)->get()));
        $newindex = 0;
        for ($i = 0;$i <count($baiDuyet);$i++){
            $array[$i]['id'] = $baiDuyet[$i]->id;
            $array[$i]['tieu_de'] = $baiDuyet[$i]->tieu_de;
            $array[$i]['luong'] = $baiDuyet[$i]->luong;
            $array[$i]['tuoi'] = $baiDuyet[$i]->tuoi;
            $array[$i]['ten_chuc_vu'] = $baiDuyet[$i]->ten_chuc_vu;
            $array[$i]['han_tuyen'] = $baiDuyet[$i]->han_tuyen;
            $array[$i]['han_bai_viet'] = $baiDuyet[$i]->han_bai_viet;
            $array[$i]['so_luong_tuyen'] = $baiDuyet[$i]->so_luong_tuyen;
            $array[$i]['kinh_nghiem'] = $baiDuyet[$i]->kinh_nghiem;
            $array[$i]['gioi_tinh_tuyen'] = $baiDuyet[$i]->gioi_tinh_tuyen;
            $array[$i]['mo_ta'] = $baiDuyet[$i]->mo_ta;
            $array[$i]['quyen_loi'] = $baiDuyet[$i]->quyen_loi;
            $array[$i]['yeu_cau_cong_viec'] = $baiDuyet[$i]->yeu_cau_cong_viec;
            $array[$i]['yeu_cau_ho_so'] = $baiDuyet[$i]->yeu_cau_ho_so;
            $array[$i]['ky_nang_basic'] = $baiDuyet[$i]->ky_nang_basic;
            $array[$i]['dia_chi'] = $baiDuyet[$i]->dia_chi;
            $array[$i]['status'] = $baiDuyet[$i]->status;
            $array[$i]['isHot'] = $baiDuyet[$i]->isHot;
            $array[$i]['get_nha_tuyen_dung']['id'] = $baiDuyet[$i]->get_nha_tuyen_dung->id;
            $array[$i]['get_nha_tuyen_dung']['prefix'] = $baiDuyet[$i]->get_nha_tuyen_dung->prefix;
            $array[$i]['get_nha_tuyen_dung']['dia_chi'] = $baiDuyet[$i]->get_nha_tuyen_dung->dia_chi;
            $array[$i]['get_nha_tuyen_dung']['mang_xa_hoi'] = $baiDuyet[$i]->get_nha_tuyen_dung->mang_xa_hoi;
            $array[$i]['get_nha_tuyen_dung']['gioi_thieu'] = $baiDuyet[$i]->get_nha_tuyen_dung->gioi_thieu;
            $array[$i]['get_nha_tuyen_dung']['avatar'] = $baiDuyet[$i]->get_nha_tuyen_dung->avatar;
            $array[$i]['get_nha_tuyen_dung']['gioi_tinh'] = $baiDuyet[$i]->get_nha_tuyen_dung->gioi_tinh;
            $array[$i]['get_nha_tuyen_dung']['nam_sinh'] = $baiDuyet[$i]->get_nha_tuyen_dung->nam_sinh;
            $array[$i]['get_nha_tuyen_dung']['status'] = $baiDuyet[$i]->get_nha_tuyen_dung->status;
            $array[$i]['get_nha_tuyen_dung']['tai_khoan'] = json_decode(NhaTuyenDung::query()->find($baiDuyet[$i]->get_nha_tuyen_dung->id)->getTaiKhoan);
            if ($baiDuyet[$i]->get_duyet_tin != null){
                $array[$i]['get_duyet_tin'] = $baiDuyet[$i]->get_duyet_tin;
            }
//            $array[$i]['tai_khoan'] = json_decode(NhaTuyenDung::query()->find($baiDuyet[$i]->get_nha_tuyen_dung->id)->getTaiKhoan);
        }
//        foreach ($baiDuyet as $row){
//            $array[$newindex]['id'] = $row['id'];
////            if ($row['get_nha_tuyen_dung'] != null){
////                $array[$newindex]['tai_khoan'] = NhaTuyenDung::query()->find($row['get_nha_tuyen_dung']['id'])->getTaiKhoan()->get;
//                $array[$newindex]['tai_khoan'] = $row['get_nha_tuyen_dung']['id'];
//
////            }
//            $newindex++;
//        }
//        dd($array[3]['get_duyet_tin']);
//        dd(BaiTuyenDung::with('getDuyetTin')->toSql());
//        dd(BaiTuyenDung::query()->getDuyetTin->toSql());
//        dd(json_decode(DuyetBai::with('getBaiTuyenDung')->get()));
//        dd($array);
        $data['duyet_tin'] = $array;
        return view('Admin.TrangChu.index',compact('data'));
    }
    //
}
