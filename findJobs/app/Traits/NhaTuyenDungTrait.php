<?php

namespace App\Traits;

use App\Models\NganhNghe;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait NhaTuyenDungTrait
{
//    use getRespone;
//    use GetResponseTrait;

    public function getEmployer()
    {
//        File::append(public_path('sql.txt','aaaaa'));
//        Storage::disk('local')->append('file.txt', 'Contents');
//        return;
//        $_age = (time() - strtotime('1996-09-30')) / 31556926;
//        $date = date('d/m/Y','01/02/2020');
//        $date = '1996-12-01';
//        dd(substr(date('Ymd') - date('Ymd', strtotime($date)), 0));
        if (Auth::user()->loai == 2) {
            $nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->nha_tuyen_dungs;
//            dd($nhaTuyenDung);
            $nganhNghe = NganhNghe::all();
            return view('User.nhaTuyenDung',compact('nhaTuyenDung','nganhNghe'));
        } else {
            return redirect()->route('notFoundRoute');
        }
    }

    public function setLogoCongTy(Request $request)
    {
        $nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->nha_tuyen_dungs;

        $res = $request->fileName;

        $image_array_1 = explode(";", $res);
        $image_array_2 = explode(",", $image_array_1[1]);

        $image = base64_decode($image_array_2[1]);

        $imageName = $request->name. $nhaTuyenDung->id;
        $path = public_path('images/' . $imageName);
        file_put_contents($path, $image);
//        $nhaTuyenDung->avatar = 'images/' . $imageName;
//        $nhaTuyenDung->save();

        return response('images/' . $imageName);
    }

    public function confirmEmailNhaTuyenDung(Request $request)
    {

        $emailNhaTuyenDung = $request->email_nha_tuyen_dung;
        $timEmail = TaiKhoan::query()->where('email', $emailNhaTuyenDung)->exists();

        if (strtolower($emailNhaTuyenDung) == strtolower(Auth::user()->email)) {
            return $this->getResponse('Email', 200, 'ok!');
        }
        if($timEmail == 1){
            return $this->getResponse('Email', 400, 'Email đã tồn tại!');
        }
//        return $emailNhaTuyenDung;
//        return $this->getResponse('Email', 400, 'Email đã tồn tại!');
//        switch (strtolower($emailNhaTuyenDung)){
//            case '':
//        }
//        return ;
//        return
//        return Validator::make($request, [
////            'name' => ['required', 'string', 'max:255'],
//            'email_nha_tuyen_dung' => ['required', 'string', 'email', 'max:255', 'unique:tai_khoan'],
////            'password' => ['required', 'string', 'min:8', 'confirmed'],
////            'phone' => ['required', 'max:10','min:10'],
//        ])->validate();
    }

    public function updateNhaTuyenDung(Request $request){
        $title = 'Cập nhật';
        try {
            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            $taiKhoan->ho_ten = $request->ho_ten_nhatuyendung;
            $taiKhoan->email = $request->email_nhatuyendung;
            $taiKhoan->phone = $request->phone_nhatuyendung;

            $nhaTuyenDung = $taiKhoan->nha_tuyen_dungs;
            $nhaTuyenDung->gioi_tinh_tuyen_dung = $request->gioi_tinh_nhatuyendung;
            $nhaTuyenDung->nam_sinh_tuyen_dung = Carbon::createFromFormat('d/m/Y',$request->ngay_sinh_nhatuyendung)->format('Y-m-d');
            $nhaTuyenDung->avatar_tuyen_dung = $request->avatar_nhatuyendung;
            $nhaTuyenDung->ten_cong_ty = $request->name_company;
            $nhaTuyenDung->websites = $request->website_company;
            $nhaTuyenDung->email_cong_ty = $request->email_company;
            $nhaTuyenDung->phone_cong_ty = $request->phone_company;
            $nhaTuyenDung->dia_chi = $request->address_company;
            $nhaTuyenDung->gio_lam_viec = $request->time_company;//
            $nhaTuyenDung->ngay_lam_viec_cong_ty = $request->day_company;
            $nhaTuyenDung->so_luong_employee = $request->employees_company;
            $nhaTuyenDung->nganh_nghe_id = serialize($request->linh_vuc_company);
            $nhaTuyenDung->fax_cong_ty = $request->fax_company;
            $nhaTuyenDung->avatar = $request->logo_company;
            $nhaTuyenDung->mang_xa_hoi = serialize($request->social_nhatuyendung);

            $taiKhoan->save();
            $nhaTuyenDung->save();
            $message = 'Cập nhật thông tin cá nhân thành công';
            return $this->getResponse($title,200,$message,0);
        }catch (\Exception $e){
            $message = 'Cập nhật thông tin cá nhân thất bại! Kiểm tra lại dữ liệu!';
            return $this->getResponse($title,400,$e.$message,0);
        }

    }

}
