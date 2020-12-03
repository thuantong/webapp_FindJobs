<?php

namespace App\Http\Controllers\NguoiTimViec;

use App\Http\Controllers\Controller;
use App\Models\BangCap;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\NguoiTimViec;
use Illuminate\Http\Request;

class NguoiTimViecControler extends Controller
{
    public function chiTiet(Request $request)
    {
        $idNguoiTimViec = $request->get('id');

        $data['nguoi_tim_viec'] = NguoiTimViec::query()->find($idNguoiTimViec)->with([
            'getTaiKhoan' => function ($q1) {
                $q1->select('id', 'ho_ten', 'email', 'phone');
            },
            'getDiaDiem'=>function($q1){
            $q1->select('id','name');
            },
            'getBangCap'=>function($q1){
            $q1->select('id','name');
            },
            'getKieuLamViec'=>function($q1){
            $q1->select('id','name');
            }
        ])->first()->toArray();
//        dd($data);
        $data['nguoi_tim_viec']['ky_nang'] = unserialize($data['nguoi_tim_viec']['ky_nang']);
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
//        dd($data);
//        $data['dia_diem'] = DiaDiem::all()->toArray();
//        $data['bang_cap'] = BangCap::all()->toArray();
//        $data['kieu_lam_viec'] = KieuLamViec::all()->toArray();
        $typeSend = 1;
        $data['chi_tiet_nguoi_tim_viec'] = 1;
//        dd(1);
//        if ($request->has('getskill') == true){
//            dd('cc');
//            return view('User.nguoiTimViec.skillAppend',compact('typeSend','data'));
//        }
        return view('NguoiTimViec.chiTiet', compact('data', 'typeSend'));
    }
}
