<?php

namespace App\Http\Controllers\QuanLyUngVien;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\BaiTuyenDung;
use App\Models\DonXinViec;
use App\Models\NguoiTimViec;
use App\Models\TaiKhoan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class QuanLyUngVienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'email.confirm', 'nha_tuyen_dung']);
    }

    public function index()
    {
//        dd(date('H:i'));
        return view('QuanLyUngVien.index');
    }

    public function layDanhSachUngVien(Request $request)
    {
        $nhaTuyenDungId = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung->id;
        $chuaChon = 0;
        $query = DonXinViec::query()->with([
            'getBaiTuyenDung' => function ($q2) use ($nhaTuyenDungId) {
                $q2->select('id', 'tieu_de', 'nha_tuyen_dung_id')->where('bai_tuyen_dung.nha_tuyen_dung_id', $nhaTuyenDungId);;
            },
            'getNguoiTimViec' => function ($q2) {
                $q2->select('id', 'avatar', 'tai_khoan_id')->with([
                    'getTaiKhoan' => function ($q3) {
                        $q3->select('id', 'ho_ten', 'email', 'phone');
                    }
                ]);
            }
        ]);
        if (!$request->has('type') && $request->get('type') == ''){
            $query->where('status', $chuaChon);

        }else if ($request->has('type') && $request->get('type') > -1){
            $query->where('status', $request->get('type'));
        }
//            ->where('status', $chuaChon);

        $dataQuery = $query->get()->toArray();
        $data['data'] = collect($dataQuery)->whereNotNull('get_bai_tuyen_dung')->values()->toArray();
//      dd($data);
//        dd($query->get()->toArray());
        return $data;
    }

    public function layDanhSachPhongVan(Request $request)
    {
        $nhaTuyenDungId = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung->id;
//        $datChon = 1;
        $chuaChon = 0;
        $tuChoiHoSo = 3;
        $daLoai = 5;
        $query = DonXinViec::query()->with([
            'getBaiTuyenDung' => function ($q2) use ($nhaTuyenDungId) {
                $q2->select('id', 'tieu_de', 'nha_tuyen_dung_id')->where('bai_tuyen_dung.nha_tuyen_dung_id', $nhaTuyenDungId);;
            },
            'getNguoiTimViec' => function ($q2) {
                $q2->select('id', 'avatar', 'tai_khoan_id')->with([
                    'getTaiKhoan' => function ($q3) {
                        $q3->select('id', 'ho_ten', 'email', 'phone');
                    }
                ]);
            }
        ])->where('status','!=', $chuaChon)->where('status','!=', $tuChoiHoSo)->where('status','!=', $daLoai);
        if (!$request->has('type') && $request->get('type') == ''){
            $query->where('status', $chuaChon);

        }else if ($request->has('type') && $request->get('type') > -1){
            $query->where('status', $request->get('type'));
        }
        $dataQuery = $query->get()->toArray();
        $data['data'] = collect($dataQuery)->whereNotNull('get_bai_tuyen_dung')->values()->toArray();
//      dd($data);
//        dd($query->get()->toArray());
        return $data;
    }

    public function confirmDanhSachPhongVan(Request $request)
    {
        $title = 'Xác nhận phỏng vấn';
        try {
            $active = 1;
            $donXinViec = DonXinViec::query()->find($request->id);
            $donXinViec->status = $active;
            $donXinViec->created_at = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
            $donXinViec->save();
//            return $donXinViec;
            return $this->getResponse($title, 200, 'Xác nhận phỏng vấn ứng viên: ' . $request->name . ' - thành công!', $donXinViec);

        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, 'Xác nhận phỏng vấn thất bại!');
        }

    }
    public function tuChoiDanhSachPhongVan(Request $request){
        $title = "Từ chối hồ sơ";
        try {
            $trangThaiTuChoi = 3;
            $donXinViec = DonXinViec::query()->find($request->id);
            $donXinViec->status = $trangThaiTuChoi;
            $donXinViec->save();
            return $this->getResponse($title, 200, 'Từ chối hồ sơ ứng viên: ' . $request->name . ' - thành công!');

        }catch (\Exception $exception) {
            return $this->getResponse($title, 400, 'Từ chối hồ sơ ứng viên thất bại!');
        }
    }

    //châm đậu
    public function trungTuyenPhongVan(Request $request){
        $title = "Chấm trúng tuyển";
        try {
            $trangThaiTrungTuyen = 4;
            $donXinViec = DonXinViec::query()->find($request->id);
            $donXinViec->status = $trangThaiTrungTuyen;
            $donXinViec->save();
            return $this->getResponse($title, 200, 'Chấm trúng tuyển ứng viên: ' . $request->name . ' - thành công!');

        }catch (\Exception $exception) {
            return $this->getResponse($title, 400, 'Chấm trúng tuyển ứng viên thất bại!');
        }
    }

    public function datLichPhongVan(Request $request)
    {
        $title = "Đặt lịch phỏng vấn";
        $id = $request->id;
        $ngay = Carbon::createFromFormat('d/m/Y', $request->ngay)->format('Y-m-d');
        $gio = $request->gio;
        $donXinViec = DonXinViec::query()->find($id);
        $donXinViec->ngay_phong_van = $ngay;
        $donXinViec->thoi_gian_phong_van = $gio;
        $donXinViec->save();

        $baiTuyenDung = BaiTuyenDung::query()->with([
            'getNhaTuyenDung' => function ($q) {
                $q->select('id', 'tai_khoan_id')->with([
                    'getTaiKhoan' => function ($q2) {
                        $q2->select('id', 'ho_ten', 'email_confirmed');
                    }
                ]);
            },
            'getCongTy' => function ($q) {
                $q->select('id', 'name', 'phone','email','fax','dia_chi');
            },
        ]);

        $data['data'] = $baiTuyenDung->where('id', $donXinViec->bai_tuyen_dung_id)->select(['id','cong_ty_id','nha_tuyen_dung_id'])->get()->first()->toArray();

        $nguoiTimViec = NguoiTimViec::query()->with([
            'getTaiKhoan' => function ($q) {
                $q->select('id', 'email_confirmed', 'ho_ten', 'phone');
            }
        ])->where('id', $donXinViec->nguoi_tim_viec_id)->select('id', 'tai_khoan_id')->get()->first()->toArray();

        $data['nguoi_tim_viec'] = $nguoiTimViec;
        $dataEmail = array(
            'subject' => ucwords('Xác thực phỏng vấn'),
            'view' => 'QuanLyUngVien.gui_thong_bao',
            'data' => $data,
        );
        $sendEmail = $data['nguoi_tim_viec']['get_tai_khoan']['email_confirmed'];
        Mail::to($sendEmail)->send(new SendEmail($dataEmail));
        return $this->getResponse($title, 200, "Đặt lịch phỏng vấn thành công! Chờ người tìm việc xác nhận!");
    }
}
