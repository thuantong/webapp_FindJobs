<?php

namespace App\Traits;

use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


trait NguoiTimViecTrait
{
    use LoginTrait, GetResponseTrait;
//    public function removeVNchar($str) {
////        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
////        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
////        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
////        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
////        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
////        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
////        $str = preg_replace("/(đ)/", 'd', $str);
//
//        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
//        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
//        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
//        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
//        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
//        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
//        $str = preg_replace("/(Đ)/", 'D', $str);
//        $str = preg_replace("/( )/", '', $str);
//        return $str;
//    }

    public function doiMatKhau(Request $request)
    {
        $tatus_sucess = 'Thành công';
        $tatus_error = 'Thất bại';

        if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == true) {
            if ($request->password_new == $request->re_password_new) {
                $taiKhoanTim = TaiKhoan::query()->find(Auth::user()->id);
                $taiKhoanTim->password = bcrypt($request->password_new);
                $taiKhoanTim->save();
                $message = 'Mật khẩu thay đổi thành công';
                return $response = $this->getResponse($tatus_sucess, 200, $message);
            } else {
                $message = 'Mật khẩu xác thực không chính xác';
                $reset = 1;
                return $response = $this->getResponse($tatus_error, 400, $message, $reset);
            }
        } else if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == false) {
            $message = 'Mật khẩu cũ không chính xác';
            $reset = 1;

            return $response = $this->getResponse($tatus_error, 400, $message, $reset);
        }

    }

//    public function

    public function validateDoiMatKhau(array $data)
    {
//        return $data['password_old'];
//        $message =array(
//            'required'=>':Attribute không được để trống.',
//
//        );
//        $customAttributes = [
//            'password-old' => 'Mật khẩu cũ',
//            'password-new' => 'Mật khẩu mới',
//        ];
////        return Validator::make($data,$rule);
//        return Validator::make($data, [
//            $data['password_old']=>'required',
//            $data['password_new']=>'required',
////            're-password-new'=>'required',
//        ],$message);
    }

    public function getViewSkill(Request $request)
    {
        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->nguoi_tim_viecs;

        return view('User.nguoiTimViec.skill', compact('nguoiTimViec'));
    }

    public function getViewSkillAppend(Request $request)
    {
//        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->nguoi_tim_viecs;

        return view('User.nguoiTimViec.skillAppend');
    }

    public function upDateSkill(Request $request)
    {
        $title = 'Sửa kỹ năng';
        $reset = 0;
        $message = 'Bạn vừa cập nhật kỹ năng thành công';
        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->nguoi_tim_viecs;
//        return serialize($request->data);
        $nguoiTimViec->ky_nang = serialize($request->data);
        $nguoiTimViec->save();
        return $this->getResponse($title, 200, $message, $reset);
    }

    public function projectView(Request $request){
        $data = array();
        $index = $request->index;
        $type = $request->type;
//        if($type == 0){
//            $data =
//        }
        return view('User.nguoiTimViec.projectsAppend',compact('index','type'));
    }

    public function getHtmlProjectStatus(){
        return view('User.nguoiTimViec.htmlProjectStatus');
    }

}
