<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonXinViec extends Model
{
    protected $table = 'don_xin_viec';
    protected $primaryKey = 'id';
//    protected $dateFormat = 'Y-m-d H+7:i:sO';
    public $timestamps = true;
    protected $fillable = [
        'file',
        ];
    protected $attributes = [
        'status' => 0,
    ];

    //
}
