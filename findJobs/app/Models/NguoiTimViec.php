<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiTimViec extends Model
{
    protected $table = 'nguoi_tim_viec';
    protected $primaryKey  = 'id';
    public $timestamps = false;

    protected $fillable = [
        'viec_can_tim',
        'gioi_thieu',
        'dia_chi',
        'gioi_tinh',
        'ngay_sinh',
        'ky_nang',
        'exp_lam_viec',
        'projects',
        'vi_tri_tim',
        'so_thich',
        'avatar',
        'status',
        'social',
        'muc_luong'
    ];
    protected $attributes = [
        'status' => 1,
        'gioi_tinh' => 1,
    ];

    //Tài khoản người tìm việc
    public function getTaiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
    public function getTaiKhoanId(){
        return $this->getTaiKhoan->pluck('id');
    }


    //Lấy số dư người tìm việc
    public function getSoDu(){
        return $this->hasOne(SoDu::class,'nguoi_tim_viec_id');
    }
    public function getSoDuId(){
        return $this->getSoDu->pluck('id');
    }

    //Quan tâm nhà tuyển dụng
    public function getNhaTuyenDungQuanTam(){
        return $this->belongsToMany(NhaTuyenDung::class,'quan_tam','nguoi_tim_viec_id','nha_tuyen_dung_id');
    }
    public function getNhaTuyenDungQuanTamId(){
        return $this->getNhaTuyenDungQuanTam->pluck('id');
    }

    //lấy tin nhắn nhà tuyển dụng
    public function getTinNhanNhaTuyenDung(){
        return $this->belongsToMany(NhaTuyenDung::class,'tin_nhan','nguoi_tim_viec_id','nha_tuyen_dung_id');
    }

    //lấy tin nhắn quản trị viên
    public function getTinNhanQuanTriVien(){
        return $this->belongsToMany(QuanTriVien::class,'tin_nhan','nguoi_tim_viec_id','quan_tri_vien_id');
    }
}
