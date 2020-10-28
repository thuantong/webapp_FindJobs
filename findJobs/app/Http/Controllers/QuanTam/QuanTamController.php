<?php

namespace App\Http\Controllers\QuanTam;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
use App\Models\Thich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanTamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setQuanTam(Request $request){
        try {
            $idNhaTuyenDung = $request->get('id');
//            dd($idPost);
            $status = intval($request->get('quan_tam'));
            $nguoiTimViecQuanTam = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->get();
            $nhaTuyenDung = NhaTuyenDung::query()->find($idNhaTuyenDung);
            switch ($status){
                case 0:
                    $nhaTuyenDung->getNguoiTimViecQuanTam()->detach($nguoiTimViecQuanTam);
                    break;
                case 1:
                    $nhaTuyenDung->getNguoiTimViecQuanTam()->attach($nguoiTimViecQuanTam);
                    break;
            }
//            $data['total_thich'] = Thich::query()->where('bai_tuyen_dung_id',$idPost)->count();
            $data['total_thich'] = 0;
//dd($nguoiLike);
            return $data;
//            $baiTuyenDung = BaiTuyenDung::query()->find($id);
//            $baiTuyenDung->
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    //
}
