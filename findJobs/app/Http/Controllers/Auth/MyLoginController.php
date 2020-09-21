<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LoginTrait;
use Illuminate\Http\Request;
//use Illuminate\Http\JsonResponse;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class MyLoginController extends Controller
{
    use LoginTrait;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function validateLogin(array $request)
    {
        return Validator::make($request, [
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string','min:8'],

        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
//        dd($request->all(),$request->session()->all());
//        if ($response = $this->authenticated($request, $this->guard()->user())) {
//            return $response;
//        }
            return redirect('/');

    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request->all())->validate();

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.form.login');
    }

}
