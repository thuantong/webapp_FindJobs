<?php

namespace App\Http\Controllers\CongTy;

use App\Http\Controllers\Controller;
use App\Models\NganhNghe;
use Illuminate\Http\Request;

class CongTyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $nganhNghe = NganhNghe::all();
        return view('CongTy.index',compact('nganhNghe'));
    }

    public function getDanhSach(){

        for ($i= 0;$i<1000;$i++){
            $data[$i] = array(
                'id'=> $i+1,
                'name' => 'nameádasdaasdasdasdsad'.$i,
                'email' => 'emailádadasdasdasdas'.$i,
                'phone' => 'phoneádasdasdsadsadasd'.$i,
                'website' => 'websiteádsadsadasd'.$i,
                'chucnang' => 'chucnangádasdasdadasdsad'.$i,

            );
        }
        return $data;

    }
    //
}
