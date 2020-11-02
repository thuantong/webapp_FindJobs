<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyTaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['phan_quyen'] = PhanQuyen::all()->toArray();
//        for($i = 0; count($data['phan_quyen']) ; $i++){
//            echo $data['phan_quyen'][$i]['name'];
//            echo '<br>';
//        }
//        dd($data);
        return view('Admin.QuanLyTaiKhoan.index',compact('data'));
    }
    public function getDanhSachTaiKhoan(){
        $data['data'] = TaiKhoan::query()->with('getPhanQuyen')->get()->toArray();
        return $data;
        dd($data);
    }
    public function getTacVu(Request $request){
        $dataAjax = $request->toArray();
        $id = $dataAjax['data']['id'];
        $data['tai_khoan_phan_quyen'] = TaiKhoan::query()->find($id)->getPhanQuyenId()->toArray();
        $data['phan_quyen'] = PhanQuyen::all()->toArray();
        $data['id'] = $id;
        return view('Admin.QuanLyTaiKhoan.viewPhanQuyen',compact('data'));
    }
}
