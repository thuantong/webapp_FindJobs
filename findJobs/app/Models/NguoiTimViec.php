<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiTimViec extends Model
{
    protected $table = 'nguoi_tim_viec';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['viec_can_tim', 'gioi_thieu','dia_chi','gioi_tinh','ngay_sinh','ky_nang','exp_lam_viec','projects','vi_tri_tim','so_thich','avatar','status','social','muc_luong'];
    protected $attributes = [
        'status' => 1,
        'gioi_tinh' => 1,
    ];
    public function tai_khoans(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
}
