<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\DuyetBai;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class DuyetBaiVietController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
        if (Session::get('loai_tai_khoan') != 3){
            abort(404);
        }
//        dd(Carbon::now($this->tzHoChiMinh())->toDateTimeString());

//        dd(date('H:i'));
        return view('Admin.DuyetTin.index');
    }

    public function getDanhSachDuyetTin(){
//        $allBaiDuyet = DuyetBai::with('getBaiTuyenDung')->orderBy('created_at','desc')->get()->toArray();
//        $allBaiDuyet = BaiTuyenDung::query()->select(['bai_tuyen_dung.tieu_de','tai_khoan.ho_ten','bai_tuyen_dung.created_at','bai_tuyen_dung.created_at'])
        $allBaiDuyet = BaiTuyenDung::query()->select(['bai_tuyen_dung.*','tai_khoan.ho_ten','don_hang.so_luong as so_ngay_bai_dang'])
            ->leftJoin('duyet_bai','bai_tuyen_dung.id','=','duyet_bai.bai_dang_id')
            ->leftJoin('nha_tuyen_dung','bai_tuyen_dung.nha_tuyen_dung_id','=','nha_tuyen_dung.id')
            ->leftJoin('tai_khoan','tai_khoan.id','=','nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('don_hang','bai_tuyen_dung.id','=','don_hang.bai_tuyen_dung_id')
//            ->where('bai_tuyen_dung.status',0)
            ->orderBy('bai_tuyen_dung.status','asc')
//            ->order
            ->get()->toArray();
//        return $allBaiDuyet;

//        for($i = 0;$i<count($allBaiDuyet);$i++){
//            $allBaiDuyet[$i]['created_at'] = Carbon::parse($allBaiDuyet[$i]['created_at'])->setTimezone('Asia/Ho_Chi_Minh')->format('H:i , d/m/Y');
//        }
        $data['data'] = $allBaiDuyet;
        return $data;
    }

    public function getBaiTuyenDung(Request $request){
        $id = $request->get('id');
        $data = BaiTuyenDung::query()->with('getNhaTuyenDung','getNganhNghe','getCongTy','getChucVu','getKieuLamViec','getDiaDiem','getBangCap','getKinhNghiem')->find($id)->toArray();
        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
        $data['luong'] = unserialize($data['luong']);

        return $data;
    }

    public function confirmBaiTuyenDung(Request $request){
        $title = "Thông báo";
        $id = $request->id;
        $baiTuyenDung = BaiTuyenDung::query()->find($id);
        try {
            $baiTuyenDung->status = 1;//accept
            $baiTuyenDung->save();
            return $this->getResponse($title,200,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thành công!');
        }catch (\Exception $e){
            return $this->getResponse($title,400,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thất bại!');
        }
    }
}
