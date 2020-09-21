<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use App\Traits\StoredJobsTrait;
use Illuminate\Http\Request;
use App\Models\JobsModel;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    use StoredJobsTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('TrangChu.index');
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
    public function logout(){
        Auth::logout();
    }
}
