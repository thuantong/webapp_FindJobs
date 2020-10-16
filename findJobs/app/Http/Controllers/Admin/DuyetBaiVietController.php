<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DuyetBai;
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
        return view('Admin.DuyetTin.index');
    }

    public function getDanhSachDuyetTin(){
        $allBaiDuyet = DuyetBai::with('getBaiTuyenDung')->orderBy('created_at','desc')->get()->toArray();
//        Carbon::setLocale(config('app.timezone'));
        for($i = 0;$i<count($allBaiDuyet);$i++){

//            $allBaiDuyet[$i]['created_at'] = Carbon::parse($allBaiDuyet[$i]['created_at'])->format('H:s d/m/Y');->setTimezone('Asia/Ho_Chi_Minh')
            $allBaiDuyet[$i]['created_at'] = Carbon::parse($allBaiDuyet[$i]['created_at'])->format('d/m/Y');
        }
        $data['data'] = $allBaiDuyet;
//        return date_default_timezone_get();
        return $data;
    }
    //
}
