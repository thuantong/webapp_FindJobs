<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\CongTy;
use App\Models\DuyetBai;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

//        if (Session::get('loai_tai_khoan') !== 'admin3'){
//            abort(404);
//        }
    }

    public function index()
    {
        if (Session::get('loai_tai_khoan') != 3) {
            abort(404);
        }
//                dd(Session::get('loai_tai_khoan'));

//        $baiDuyet = json_decode(CongTy::with('getNhaTuyenDung','getNganhNghe')->get());
//        $data = $baiDuyet['created_at'];
//        dd(json_decode($data));
//        dd($baiDuyet);
//        dd($baiDuyet[0]->get_nha_tuyen_dung->id);
//        dd($baiDuyet[0]->get_duyet_tin);
//        dd($baiDuyet[4]['get_nha_tuyen_dung']['id']);
//        dd(json_decode(BaiTuyenDung::with('getDuyetTin','getNhaTuyenDung')->where('status','=',0)->get()));

//        dd(Carbon::parse($data['duyet_tin'][0]['created_at'])->diffForHumans(null,null,true,2));
        return view('Admin.index');
    }

    public function getThongbao()
    {
        $baiDuyet = BaiTuyenDung::with('getDuyetTin', 'getNhaTuyenDung')->get()->toArray();
        $tinChuaDoc = DuyetBai::all()->where('status', 0)->count();
        Carbon::setLocale('vi');
        if ($baiDuyet != null) {
            for ($i = 0; $i < count($baiDuyet); $i++) {
                $baiDuyet[$i]['created_at'] = Carbon::parse($baiDuyet[$i]['created_at'])->diffForHumans(null, null, true, 2);
                $baiDuyet[$i]['get_nha_tuyen_dung']['tai_khoan'] = NhaTuyenDung::query()->find($baiDuyet[$i]['get_nha_tuyen_dung']['id'])->getTaiKhoan->toArray();
                $baiDuyet[$i]['trang_thai_xem_tin'] = DuyetBai::query()->where('bai_dang_id', $baiDuyet[$i]['id'])->first('status');
            }

            $data['duyet_tin'] = $baiDuyet;
            $data['tin_chua_doc'] = $tinChuaDoc;
        }

        return $data;
    }

    public function chuyenTrangThaiDaXem(Request $request)
    {
        try {
            $baiViet = DuyetBai::query()->where('bai_dang_id', $request->id)->first();
//        return $baiViet;
            $baiViet->status = 1;
            $baiViet->save();

//        $data['tin_chua_doc'] = DuyetBai::all()->where('status',0)->count();
            return 200;
        } catch (\Exception $e) {
            return 400;
        }

    }
    //
}
