<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirmEmailView(){
        return view('auth.verify');
    }
    //
}
