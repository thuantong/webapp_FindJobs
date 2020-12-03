<?php

namespace App\Http\Controllers\QuanLyUngVien;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\DonXinViec;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyUngVienController extends Controller
{
    public function index()
    {
        return view('QuanLyUngVien.index');
    }

    public function layDanhSachUngVien()
    {
        $nhaTuyenDungId = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung->id;
        $chuaChon = 0;
        $query = DonXinViec::query()->with([
            'getBaiTuyenDung' => function ($q2) use ($nhaTuyenDungId) {
                $q2->select('id', 'tieu_de','nha_tuyen_dung_id')->where('bai_tuyen_dung.nha_tuyen_dung_id',$nhaTuyenDungId);;
            },
            'getNguoiTimViec' => function ($q2) {
                $q2->select('id', 'avatar', 'tai_khoan_id')->with([
                    'getTaiKhoan' => function ($q3) {
                        $q3->select('id', 'ho_ten', 'email', 'phone');
                    }
                ]);
            }
        ])->where('status', $chuaChon);

        $dataQuery = $query->get()->toArray();
        $data['data'] = collect($dataQuery)->whereNotNull('get_bai_tuyen_dung')->values()->toArray();
//      dd($data);
//        dd($query->get()->toArray());
        return $data;
    }

    public function layDanhSachPhongVan(){
        $nhaTuyenDungId = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung->id;
        $datChon = 1;
        $query = DonXinViec::query()->with([
            'getBaiTuyenDung' => function ($q2) use ($nhaTuyenDungId) {
                $q2->select('id', 'tieu_de','nha_tuyen_dung_id')->where('bai_tuyen_dung.nha_tuyen_dung_id',$nhaTuyenDungId);;
            },
            'getNguoiTimViec' => function ($q2) {
                $q2->select('id', 'avatar', 'tai_khoan_id')->with([
                    'getTaiKhoan' => function ($q3) {
                        $q3->select('id', 'ho_ten', 'email', 'phone');
                    }
                ]);
            }
        ])->where('status', $datChon);

        $dataQuery = $query->get()->toArray();
        $data['data'] = collect($dataQuery)->whereNotNull('get_bai_tuyen_dung')->values()->toArray();
//      dd($data);
//        dd($query->get()->toArray());
        return $data;
    }
    public function confirmDanhSachPhongVan(Request $request){
        $title = 'Xác nhận phỏng vấn';
        try {
            $active = 1;
            $donXinViec = DonXinViec::query()->find($request->id)->first();
            $donXinViec->status = $active;
            $donXinViec->save();
            return $this->getResponse($title,200,'Xác nhận phỏng vấn ứng viên: '.$request->name.' - thành công!');

        }catch (\Exception $exception){
            return $this->getResponse($title,400,'Xác nhận phỏng vấn thất bại!');
        }

    }
}
