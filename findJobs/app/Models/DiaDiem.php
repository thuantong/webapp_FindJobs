<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    protected $table = 'dia_diem';
    protected $primaryKey  = 'id';
    public $timestamps = false;

    public function getBaiTuyenDung(){
        return $this->hasMany(BaiTuyenDung::class,'dia_diem_id');
    }
}
