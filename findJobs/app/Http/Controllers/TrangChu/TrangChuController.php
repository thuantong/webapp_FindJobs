<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\NganhNghe;
use App\Models\TaiKhoan;
use App\Traits\StoredJobsTrait;
use Illuminate\Http\Request;
use App\Models\JobsModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class TrangChuController extends Controller
{
    use StoredJobsTrait;

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        if (Auth::user()->loai == 3){
//            dd('trang admin');
//        }
//        dd('c');
//        dd(TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec()->first()->with([
//            'getDonXinViec'=>function($q){
//                $q->select('id','nguoi_tim_viec_id');
//            }
//        ])->get()->toArray());
        $data = $this->getBaiTuyenDung($request);

        return view('TrangChu.index', compact('data'));
    }

    public function searchInput(Request $request)
    {
        return view('TrangChu.items');
    }

    public function details()
    {
        dd(JobsModel::all());

        return view('TrangChu.chiTiet');
    }

    public function create(Request $request)
    {
//       csrf_token();
//        $jobs = new JobsModel();
//        $jobs->tieu_de = "";//string
//        $jobs->luong = "";//double
//        $jobs->khu_vuc = "";//int
//        $jobs->han_tuyen = "";//date time
//        $jobs->chuc_vu = "";//string
//        $jobs->kieu_lam_viec = "";// 0 - 1
//        $jobs->so_luong_tuyen = "";//int
//        $jobs->nganh_nghe = "";//array
//        $jobs->kinh_nghiem = "";//float
//        $jobs->gioi_tinh = "";//int
//        $jobs->gioi_tinh_text = $this->getGioiTinhText($request->gioiTinh);//string
//        $jobs->bang_cap = "";//string
//        $jobs->mo_ta = "";//text
//        $jobs->quyen_loi = "";//text
//        $jobs->yeu_cau_cong_viec = "";//text
//        $jobs->yeu_cau_ho_so = "";//text
//        $jobs->skill_basic = "";//text
//        $jobs->status = "";//int
//        $jobs->status_text = $this->getStatusText($request->trangThai);//int
//        $jobs->employer_id = -1;//bigint
//        $jobs->isConfirm = "";//int 1-0
//        $jobs->isConfirm_text = $this->getConfirmText($request->xacNhan);//int
//        $jobs->isHot = "";//int
//        $jobs->isHot_text = $this->getHotText($request->topHot);//int

//        DB::raw('call create_job("test chơi")');

//        (IN txtTieuDe varchar(255), IN txtluong double, IN txtKhuVuc int, IN txtHanTuyen date, IN txtChucVu varchar(255), IN txtKieuLamViec tinyint, IN txtso_luong_tuyen int, IN txtnganh_nghe text, IN txtkinh_nghiem double, IN txtgioi_tinh int, IN txtbang_cap varchar(255), IN txtmo_ta text, IN txtquyen_loi text, IN txtyeu_cau_cong_viec text, IN txtyeu_cau_ho_so text, IN txtskill_basic text, IN txtstatus int, IN txtemployer_id bigint, IN txtisConfirm tinyint, IN txtisHot tinyint)
//
        DB::insert('call create_job("Tieu de", 100000, 1, "' . date('Y-m-d H:i:s') . '", "IN txtChucVu varchar(255)", 1, 1000, "IN txtnganh_nghe text", 12.0, 1, "IN txtbang_cap varchar(255)", "IN txtmo_ta text", "IN txtquyen_loi text", "IN txtyeu_cau_cong_viec text"," IN txtyeu_cau_ho_so text"," IN txtskill_basic text", 1, 2, 0, 0)');

    }

    public function update($id)
    {
        $jobs = new JobsModel();
        $jobsFind = $jobs->newQuery()->find($id);
        if ($jobsFind != null) {
            DB::update('call update_job(' . $id . ',"Tieu de1212s", 100000, 1, "' . date('Y-m-d H:i:s') . '", "IN txtChucVu varchar(255)", 1, 1000, "IN txtnganh_nghe text", 12.0, 1, "IN txtbang_cap varchar(255)", "IN txtmo_ta text", "IN txtquyen_loi text", "IN txtyeu_cau_cong_viec text"," IN txtyeu_cau_ho_so text"," IN txtskill_basic text", 1, 2, 0, 0)');
        } else {
            dd('khong tim thay');
        }

    }

    public function delete($id)
    {
        $jobs = new JobsModel();
        $jobsFind = $jobs->newQuery()->find($id);
        if ($jobsFind != null) {
            $jobsFind->delete();
        } else {
            dd('khoong ton tai');
        }
    }

    public function getBaiTuyenDung(Request $request)
    {
        try {
            $page = 1;//default
            $query = BaiTuyenDung::with([
                'getNhaTuyenDung' => function ($subquery) {
                    $subquery->select('id', 'tai_khoan_id')->with(
                        [
                            'getTaiKhoan' => function ($q) {
                                $q->select('id', 'ho_ten');
                            },
                            'getCongTy'=>function($q){
                            $q->select('id','logo','name');
                            }
                        ]
                    );
                },
                'getDonHang' => function ($subquery) {
                    $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
                },
                'getDiaDiem' => function ($subquery) use ($request) {
                    if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
                        $subquery->select('id', 'name')->where('id', $request->get('dia_diem'));
                    } else {
                        $subquery;
                    }

                },
                'getCongTy' => function ($subquery) {
                    $subquery->select('id', 'name', 'logo');
                },
                'getNganhNghe' =>function($q) use ($request){
                    if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
                        $q->where('nganh_nghe_id',$request->get('nganh_nghe'));
                    }else{
                        $q;
                    }

                }

            ]);
            if ($request->exists('page') && $request->get('page') != "") {
                $page = $request->get('page');
            }
            if ($request->exists('tieu_de') && $request->get('tieu_de') != "") {
                $query->where('tieu_de', 'like', '%' . $request->get('tieu_de') . '%');
            }
            if ($request->exists('chuc_vu') && $request->get('chuc_vu') != "") {
                $query->where('chuc_vu_id',$request->get('chuc_vu'));
            }
            if ($request->exists('muc_luong') && $request->get('muc_luong') != "") {
                switch ($request->get('muc_luong')){
                    case 1:
                        $muc_luong_id = 2;
                        break;
                    case 2:
                        $muc_luong_id = 5;
                        break;
                    case 3:
                        $muc_luong_id = 10;
                        break;
                    case 4:
                        $muc_luong_id = 20;
                        break;
                }
                $query->where('luong_from','<=',$muc_luong_id);
            }
            if ($request->exists('kieu_lam_viec') && $request->get('kieu_lam_viec') != "") {
                $query->where('kieu_lam_viec_id',$request->get('kieu_lam_viec'));
            }
            $trangThaiDaDuyet = 1;
            $dataNew = $query->distinct('id')->where('status', $trangThaiDaDuyet);

//            if ($request->exists('tieu_de') && $request->get('tieu_de') != "") {
//                $dataNew = $dataNew->orWhere('tieu_de', 'like', '%' . $request->get('tieu_de') . '%');
//            }
            $dataNew = $dataNew->orderBy('isHot', 'desc')->get()->toArray();
//            dd($dataNew);
            $colect = collect($dataNew);
            if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
                $colect = $colect->whereNotNull('get_dia_diem');
            }
            if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
                $colect = $colect->where('get_nganh_nghe','!=',array());
            }
            $colect = $colect->values()->toArray();
//            dd($colect);
            $perpage = 10;
            $colection = collect($colect);
            $data['bai_tuyen_dung'] = new LengthAwarePaginator(
                $colection->forPage($page, $perpage),
                $colection->count(),
                $perpage,
                $page,
                ['path' => route($request->route()->getName())]
            );
//            dd($data);
//dd($request->exists('page'));
//            $trangThaiDaDuyet = 1;


//            switch ($request->has('nganh_nghe_id') == true && $request->get('nganh_nghe_id') != null) {
//                case true :
//                    //init value
//                    $tieuDe = $request->get('tieu_de');
//                    $nganhNghe = $request->get('nganh_nghe_id') == null ? null : $request->get('nganh_nghe_id');
//                    $diaDiem = $request->get('dia_diem_id') == null ? null : $request->get('dia_diem_id');
//                    $query = NganhNghe::query()->find($nganhNghe)->getBaiTuyenDung()->newQuery()->with([
//                        'getNhaTuyenDung' => function ($subquery) {
//                            $subquery->select('id', 'tai_khoan_id')->with(
//                                [
//                                    'getTaiKhoan' => function ($q) {
//                                        $q->select('id', 'ho_ten');
//                                    }
//                                ]
//                            );
//                        },
//                        'getDonHang' => function ($subquery) {
//                            $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
//                        },
//                        'getDiaDiem' => function ($subquery) {
//                            $subquery->select('id', 'name as dia_diem');
//                        },
//                        'getCongTy' => function ($subquery) {
//                            $subquery->select('id', 'name as cong_ty_name', 'logo as cong_ty_logo');
//                        },
//
//                    ]);
//
//                    if ($request->has('kieu_lam_viec') == true && $request->get('kieu_lam_viec') != null) {
//                        $query->where('kieu_lam_viec_id', $request->get('kieu_lam_viec'));
//                    }
//                    if ($request->has('chuc_vu') == true && $request->get('chuc_vu') != null) {
//                        $query->where('chuc_vu_id', $request->get('chuc_vu'));
//                    }
//
//                    if ($request->has('dia_diem_id') == true && $request->get('dia_diem_id') != null) {
//                        $query->where('dia_diem_id', $request->get('dia_diem_id'));
//                    }
//
////                }
//                    $data['bai_tuyen_dung'] = $query->distinct('bai_tuyen_dung.id')->where('status', $trangThaiDaDuyet)->orderBy('bai_tuyen_dung.isHot', 'desc')->paginate(10, ['bai_tuyen_dung.id', 'bai_tuyen_dung.tieu_de', 'bai_tuyen_dung.ten_chuc_vu', 'luong', 'bai_tuyen_dung.isHot', 'bai_tuyen_dung.status', 'bai_tuyen_dung.han_tuyen', 'bai_tuyen_dung.nha_tuyen_dung_id', 'bai_tuyen_dung.dia_diem_id', 'bai_tuyen_dung.cong_ty_id'], 'page', $page);
//                    break;
//                case false:
//                    $query = BaiTuyenDung::with([
//                        'getNhaTuyenDung' => function ($subquery) {
//                            $subquery->select('id', 'tai_khoan_id')->with(
//                                [
//                                    'getTaiKhoan' => function ($q) {
//                                        $q->select('id', 'ho_ten');
//                                    }
//                                ]
//                            );
//                        },
//                        'getDonHang' => function ($subquery) {
//                            $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
//                        },
//                        'getDiaDiem' => function ($subquery) {
//                            $subquery->select('id', 'name as dia_diem');
//                        },
//                        'getCongTy' => function ($subquery) {
//                            $subquery->select('id', 'name as cong_ty_name', 'logo as cong_ty_logo');
//                        },
//
//                    ]);
//
//                    $tieuDe = $request->get('tieu_de');
//
//                    if ($request->has('kieu_lam_viec') == true && $request->get('kieu_lam_viec') != null) {
//                        $query->where('kieu_lam_viec_id', $request->get('kieu_lam_viec'));
//                    }
//                    if ($request->has('chuc_vu') == true && $request->get('chuc_vu') != null) {
//                        $query->where('chuc_vu_id', $request->get('chuc_vu'));
//                    }
//
//                    if ($request->has('dia_diem_id') == true && $request->get('dia_diem_id') != null) {
//                        $query->where('dia_diem_id', $request->get('dia_diem_id'));
//                    }
//
//
//
//                    break;
//            }


            $data['trang_hien_tai'] = $data['bai_tuyen_dung']->currentPage();
            $data['check_trang'] = $data['bai_tuyen_dung']->nextPageUrl();

            return $data;

        } catch (\Exception $e) {
            return redirect('/');
        }
//        dd('cc');

    }
//    public function logout(){
//        Auth::logout();
//    }
}
