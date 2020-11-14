<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Traits\StoredJobsTrait;
use Illuminate\Http\Request;
use App\Models\JobsModel;
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

    public function index(){
//        if (Auth::user()->loai == 3){
//            dd('trang admin');
//        }
        $data = $this->getBaiTuyenDung();
//        dd($data);
//        dd(Session::has('loai_tai_khoan'));
        return view('TrangChu.index',compact('data'));
    }
    public function searchInput(Request $request){
        return view('TrangChu.items');
    }
    public function details(){
        dd(JobsModel::all());

        return view('TrangChu.chiTiet');
    }
    public function create(Request $request){
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
        DB::insert('call create_job("Tieu de", 100000, 1, "'.date('Y-m-d H:i:s').'", "IN txtChucVu varchar(255)", 1, 1000, "IN txtnganh_nghe text", 12.0, 1, "IN txtbang_cap varchar(255)", "IN txtmo_ta text", "IN txtquyen_loi text", "IN txtyeu_cau_cong_viec text"," IN txtyeu_cau_ho_so text"," IN txtskill_basic text", 1, 2, 0, 0)');

    }
    public function update($id){
        $jobs = new JobsModel();
        $jobsFind = $jobs->newQuery()->find($id);
        if($jobsFind != null){
            DB::update('call update_job('.$id.',"Tieu de1212s", 100000, 1, "'.date('Y-m-d H:i:s').'", "IN txtChucVu varchar(255)", 1, 1000, "IN txtnganh_nghe text", 12.0, 1, "IN txtbang_cap varchar(255)", "IN txtmo_ta text", "IN txtquyen_loi text", "IN txtyeu_cau_cong_viec text"," IN txtyeu_cau_ho_so text"," IN txtskill_basic text", 1, 2, 0, 0)');
        }else{
            dd('khong tim thay');
        }

    }
    public function delete($id){
        $jobs = new JobsModel();
        $jobsFind = $jobs->newQuery()->find($id);
        if($jobsFind != null){
            $jobsFind->delete();
        }else{
            dd('khoong ton tai');
        }
    }

    public function getBaiTuyenDung(){
//        $page = $request->get('page');
//        $baiTuyenDung = BaiTuyenDung::query()->with('getCongTy','getDiaDiem')->paginate(1,'*','page',$page);
        $baiTuyenDung = BaiTuyenDung::query()->select(['bai_tuyen_dung.*','tai_khoan.ho_ten','don_hang.so_luong as so_ngay_bai_dang','dia_diem.name as dia_diem','cong_ty.name as cong_ty_name','cong_ty.logo as cong_ty_logo'])
            ->leftJoin('duyet_bai','bai_tuyen_dung.id','=','duyet_bai.bai_dang_id')
            ->leftJoin('nha_tuyen_dung','bai_tuyen_dung.nha_tuyen_dung_id','=','nha_tuyen_dung.id')
            ->leftJoin('tai_khoan','tai_khoan.id','=','nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('don_hang','bai_tuyen_dung.id','=','don_hang.bai_tuyen_dung_id')
            ->leftJoin('dia_diem','bai_tuyen_dung.dia_diem_id','=','dia_diem.id')
            ->leftJoin('cong_ty','bai_tuyen_dung.cong_ty_id','=','cong_ty.id')
            ->where('bai_tuyen_dung.status',1)
            ->orderBy('isHot','desc')
            ->orderBy('bai_tuyen_dung.created_at','desc')
//            ->paginate(10,'*','page',$page);
            ->paginate(5);


        $data['bai_tuyen_dung'] = $baiTuyenDung;
        $data['trang_hien_tai'] = $baiTuyenDung->currentPage();
        $data['check_trang'] = $baiTuyenDung->nextPageUrl();

//        $data['bai_thich'] = BaiTuyenDung::with('getBaiThich')->get()->toArray();
//        dd($data['bai_thich'][0]['get_bai_thich']);
        return $data;
//        return view('TrangChu.items',compact('data'));
//        return $baiTuyenDung;
    }
//    public function logout(){
//        Auth::logout();
//    }
}
