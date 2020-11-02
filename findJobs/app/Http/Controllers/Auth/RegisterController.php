<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\TaiKhoan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        dd($data);
        if (array_key_exists('admin',$data)){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:tai_khoan'],
                'email_confirmed' => ['required', 'string', 'email', 'max:255', 'unique:tai_khoan'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'max:10','min:10'],
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:tai_khoan'],
                'email_confirmed' => ['required', 'string', 'email', 'max:255', 'unique:tai_khoan'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'max:10','min:10'],
            ]);
        }

    }

    protected function validatorAjax(array $data){
        $emailCheck = TaiKhoan::query()->where('email',$data['email'])->get();
        if ($emailCheck != null){
            return false;
        }
    }
    /**
     * Create a new User instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return TaiKhoan::create([
            'ho_ten' => $data['name'],
            'user_name' => $data['user_name'],
            'email' => $data['email_confirmed'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
//            'remember_token'=>Str::random(100)
        ]);
    }
}
