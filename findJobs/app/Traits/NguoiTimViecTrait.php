<?php

namespace App\Traits;

use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


trait NguoiTimViecTrait
{
    use LoginTrait,GetResponseTrait;

    public function doiMatKhau(Request $request)
    {
        $tatus_sucess = 'Thành công';
        $tatus_error = 'Thất bại';

        if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == true) {
            if($request->password_new == $request->re_password_new){
                $taiKhoanTim = TaiKhoan::query()->find(Auth::user()->id);
                $taiKhoanTim->password = bcrypt($request->password_new);
                $taiKhoanTim->save();
                $message = 'Mật khẩu thay đổi thành công';
                return $response = $this->getResponse($tatus_sucess,200,$message);
            }else{
                $message = 'Mật khẩu xác thực không chính xác';
                $reset = 1;
                return $response = $this->getResponse($tatus_error,400,$message,$reset);
            }
        } else if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == false){
            $message = 'Mật khẩu cũ không chính xác';
            $reset = 1;

            return $response = $this->getResponse($tatus_error,400,$message,$reset);
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
    public function getViewSkill(Request $request){
        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->nguoi_tim_viecs;
//        if(array_key_exists ( 'type' , $request) == true){
//
//        }else{
//        $ajaxCheck = '0';
//        if($request->ajax()){
//            $ajaxCheck = '1';
//            return view('User.nguoiTimViec.skill',compact('nguoiTimViec','ajaxCheck'));
//        }else{
//            $ajaxCheck = $ajaxCheck;
//            return view('User.nguoiTimViec.skill',compact('nguoiTimViec','ajaxCheck'));
//        }
                    return view('User.nguoiTimViec.skill',compact('nguoiTimViec','ajaxCheck'));


//        }
//        return $request->ajax();
//        $ajax_check = $request->ajax();
//        if($request->ajax()){
//            $ajax_check = 1;
//        }
//        return $request->ajax();
//        if($ajax_check == 1){
//            return view('User.nguoiTimViec.skill',compact('ajax_check'));
//        }else{
//        return view('User.nguoiTimViec.skill',compact('ajax_check','nguoiTimViec'));
//        }
//        if ($request->ajax()){
//            $nguoiTimViec = 1;
//            return view('User.nguoiTimViec.skill',compact('nguoiTimViec'));
//        }else{
//            return view('User.nguoiTimViec.skill',compact('nguoiTimViec'));
//
//        }

    }
    public function upDateSkill(Request $request){
        $tatus_sucess = 'Thành công';
        $reset = 0;
        $message = 'Bạn vừa cập nhật kỹ năng thành công';
        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->nguoi_tim_viecs;
        $nguoiTimViec->ky_nang = serialize($request->data);
        $nguoiTimViec->save();
        return $this->getResponse($tatus_sucess,200,$message,$reset);
    }

}
