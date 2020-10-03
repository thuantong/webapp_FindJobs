<?php

namespace App\Http\Controllers\BaiViet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('BaiViet.index');
    }

    //
}
