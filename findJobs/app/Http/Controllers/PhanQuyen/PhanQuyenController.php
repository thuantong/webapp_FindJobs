<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       return view('Admin.PhanQuyen.index');
    }
//    public function getAcc
    //
}
