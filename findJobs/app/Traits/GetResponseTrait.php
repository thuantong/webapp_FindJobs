<?php
namespace App\Traits;

trait GetResponseTrait{
    protected function getResponse($title,$status,$message,...$reset){
        return array(
            'status_text'=>$title,
            'status'=>$status,
            'message'=>$message,
            'reset'=>$reset
        );
    }
}
