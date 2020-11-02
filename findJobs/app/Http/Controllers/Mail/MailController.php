<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmailUser;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function xacThucTaiKhoan(){
        $dataEmail = array(
            'subject'=>ucwords('Xác thực tài khoản'),
            'view'=>'TaiKhoan.xacThucEmail'
        );
        $check = Mail::to('tongminhthuan040122225@gmail.com')->send(new SendEmail($dataEmail));
//        redirect
        dd($check);
    }
    //
}
