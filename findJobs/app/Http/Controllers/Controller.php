<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    public function __construct()
//    {
//        Carbon::setLocale('vi');
//    }

    public function getResponse($title,$status,$message,...$reset){
        if($status == 200){
            $status_text = 'Thành công';
        }elseif($status == 400){
            $status_text = 'Thất bại';
        }else{
            $status_text = '';
        }
        return array(
            'title'=> $title,
            'status_text'=>$status_text,
            'status'=>$status,
            'message'=>$message,
            'reset'=>$reset
        );
    }

    public function checkDangKySoDu($chucNang,$route){
        $title = 'Chưa đăng ký Số dư';
        if (Session::exists('so_du')){
//            dd(Session::get('so_du'));
            if (Session::get('so_du') != null){
                return $this->getResponse($title,200,'Có số dư');
            }elseif (Session::get('so_du') == null && Session::get('so_du') != 0){
                $data = array(
                    'ten_chuc_nang' =>$chucNang,
                    'href'=>$route
                );
//                dd($data);
                return $this->getResponse($title,400,'Bạn phải đăng ký số dư để thực hiện hành động này!',$data);
            }
        }

    }
    public function printFileSql($command,$toSql){
        Storage::disk('local')->append('sql.txt', '/*'.$command.'*/');
        Storage::disk('local')->append('sql.txt', $toSql);
    }
    public function tzHoChiMinh(){
        return 'Asia/Ho_Chi_Minh';
    }
}
