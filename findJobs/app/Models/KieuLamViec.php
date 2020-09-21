<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KieuLamViec extends Model
{
    protected $table = 'kieu_lam_viec';
    protected $primaryKey  = 'id';
    public $timestamps = true;
        protected $fillable = ['name', 'mo_ta'];

    //
}
