<?php

namespace App\Http\Controllers\NhaTuyenDung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NhaTuyenDungController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','email.confirm','nha_tuyen_dung']);
    }
    public function index(){
        return view('TimKiemUngVien.index');
    }
}
