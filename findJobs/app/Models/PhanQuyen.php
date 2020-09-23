<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    protected $table = 'phan_quyen';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['name','mo_ta'];
    public function tai_khoans()
    {
        return $this->belongsToMany(TaiKhoan::class, 'loai_tai_khoan','role_id','account_id');
    }
    public function getTaiKhoanIdsAttribute()
    {
        return $this->tai_khoans->pluck('id');
    }
//    protected $attributes = [
//        'status' => 1,
//    ];
    //
}
