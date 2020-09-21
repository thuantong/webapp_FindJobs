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
//        dd(Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'phone' => ['required', 'max:10','min:10'],
//        ]));
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tai_khoan'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:10','min:10'],
        ]);
    }

    /**
     * Create a new User instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        dd($data);
        return TaiKhoan::create([
            'ho_ten' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'loai' => $data['loai_tai_khoan'],
            'password' => Hash::make($data['password']),
//            'remember_token'=>Str::random(100)
        ]);
    }
}