<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanTriVien extends Model
{
    protected $table = 'quan_tri_vien';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['dia_chi','name'];
//    protected $attributes = [
//        'status' => 1,
//    ];
    //
}
