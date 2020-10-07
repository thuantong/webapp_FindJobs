<?php

namespace App\Http\Controllers\SoDu;

use App\Http\Controllers\Controller;
use App\Models\NhaTuyenDung;
use App\Models\PhanQuyen;
use App\Models\SoDu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SoDuController extends Controller
{
    private $taiKhoan;
    private $loaiTaiKhoan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next){
            $this->taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            $this->loaiTaiKhoan = $this->taiKhoan->getPhanQuyen->first();
            return $next($request);
        });
    }

    public function index(){
//        dd($this->taiKhoan->getNhaTuyenDung->getSoDu);
//        dd($this->loaiTaiKhoan);
        switch ($this->loaiTaiKhoan['id']) {
            case 1:
                $data['data'] = $this->taiKhoan->getNguoiTimViec->getSoDu;

                break;
            case 2:
                $data['data'] = $this->taiKhoan->getNhaTuyenDung->getSoDu;
                break;
        }
        return view('SoDu.index',compact('data'));
    }
    public function dangKy(){
        $title = 'Đăng ký';
        try {
            $soDu = new SoDu();
            $soDu->ten_tai_khoan = Str::random(12);

            switch ($this->loaiTaiKhoan['id']) {
                case 1:
                    if ($this->taiKhoan->getNguoiTimViec->getSoDu == null) {
                        $soDuNew = $this->taiKhoan->getNguoiTimViec->getSoDu()->save($soDu);
                        Session::put('so_du', $soDuNew['tong_tien']);
                    }

                    break;
                case 2:
                    if ($this->taiKhoan->getNhaTuyenDung->getSoDu == null) {
                        $soDuNew = $this->taiKhoan->getNhaTuyenDung->getSoDu()->save($soDu);
                        Session::put('so_du', $soDuNew['tong_tien']);
                    }
                    break;
            }

            return $this->getResponse($title,200,'Đăng ký tài khoản thành công!');
        }catch (\Exception $e){
            return $this->getResponse($title,400,$e->getMessage());
        }catch (InvalidArgumentException $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }catch (QueryException  $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }
    }
    //
}
