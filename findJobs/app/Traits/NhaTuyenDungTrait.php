<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait NhaTuyenDungTrait{
    public function getEmployer(){
        if(Auth::user()->loai == 2){
            return view('User.nhaTuyenDung');
        }else{
            return redirect()->route('notFoundRoute');
        }
    }
}
