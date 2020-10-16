<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use App\Traits\LoginTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

//use Illuminate\Http\JsonResponse;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class MyLoginController extends Controller
{
    use LoginTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        if ($request->has('admin')) {
            return view('Admin.Login.login');
        } else {
            if ($request->get('message_register') != null && $request->get('message_register') == 1) {
                $message_register = 'Tạo tài khoản thành công! Nhập lại tài khoản vừa tạo!';
                return view('auth.login', compact('message_register'));
            } elseif ($request->get('message_register') != 1 && $request->get('message_register') != null) {
                abort(404);
            } elseif ($request->get('message_register') == null) {
                return view('auth.login');
            }
        }

//        dd();
    }

    protected function validateLogin(array $request)
    {

        if (array_key_exists('admin', $request)) {
            return Validator::make($request, [
                $this->username() => ['required', 'string'],
                'password' => ['required', 'string', 'min:8'],

            ]);
        }
        return Validator::make($request, [
            $this->username() => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],

        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $findUser = TaiKhoan::query()->find(Auth::user()->id);
        $getPhanQuyen = PhanQuyen::query()->find($findUser->getPhanQuyenId())->first();
        Session::put('role', $getPhanQuyen->getTacVuId());
        Session::put('loai_tai_khoan', $getPhanQuyen['id']);
        switch ($getPhanQuyen['id']) {
            case 1:
                $nguoiTimViec = $findUser->getNguoiTimViec;
                $soDu = $nguoiTimViec->getSoDu;

//                Session::put('ho_ten',$nguoiTimViec->ho_ten);
                if ($soDu != null) {
                    Session::put('so_du', $soDu['tong_tien']);
                }

                Session::put('avatar', $nguoiTimViec['avatar']);
                return redirect('/');
            case 2:
                $nhaTuyenDung = $findUser->getNhaTuyenDung;
                $soDu = $nhaTuyenDung->getSoDu;
                if ($soDu != null) {
                    Session::put('so_du', $soDu['tong_tien']);
                }
//                Session::put('ho_ten',$nhaTuyenDung->ho_ten);
//                Session::put('so_du', $soDu['tong_tien']);
                Session::put('avatar', $nhaTuyenDung['avatar']);
//                dd(Session::all(),Session::exists('so_du'));

                return redirect()->route('user.nhaTuyenDung');
            case 3:
                $quanTriVien = $findUser->getQuanTriVien;
//                Session::put('ho_ten',$quanTriVien->ho_ten);

//                Session::put('loai_tai_khoan','admin'.$getPhanQuyen['id']);

                return redirect()->route('admin.index');
        }

    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function login(Request $request)
    {
//        dd($request->has('admin'));
        $this->validateLogin($request->all())->validate();

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect()->route('auth.form.login');
    }

}
