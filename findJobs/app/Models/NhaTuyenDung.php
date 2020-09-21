<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaTuyenDung extends Model
{
    protected $table = 'nha_tuyen_dung';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['prefix', 'dia_chi','websites','mang_xa_hoi','gioi_thieu','so_luong_employee','so_chi_nhanh','dia_chi_chi_nhanhs','gio_lam_viec','ten_cong_ty','avatar','status'];
    protected $attributes = [
        'status' => 1,
    ];
    public function tai_khoans(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
    //
}
