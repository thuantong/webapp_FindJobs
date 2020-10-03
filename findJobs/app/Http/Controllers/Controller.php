<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getResponse($title,$status,$message,...$reset){
        if($status == 200){
            $status_text = 'Thành công';
        }elseif($status == 400){
            $status_text = 'Thất bại';
        }
        return array(
            'title'=> $title,
            'status_text'=>$status_text,
            'status'=>$status,
            'message'=>$message,
            'reset'=>$reset
        );
    }
    public function printFileSql($command,$toSql){
        Storage::disk('local')->append('sql.txt', '/*'.$command.'*/');
        Storage::disk('local')->append('sql.txt', $toSql);
    }
}
