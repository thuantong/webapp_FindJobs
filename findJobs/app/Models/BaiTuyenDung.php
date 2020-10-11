<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiTuyenDung extends Model
{
    protected $table = 'bai_tuyen_dung';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'tieu_de',
        'luong',
        'ten_chuc_vu',
        'dia_chi',
        'tuoi',
        'han_tuyen',
        'so_luong_tuyen',
        'kinh_nghiem',
        'gioi_tinh_tuyen',
        'bang_cap',
        'mo_ta',
        'quyen_loi',
        'yeu_cau_cong_viec',
        'yeu_cau_ho_so',
        'ky_nang_basic',
        'han_bai_viet',
        'status',
        'isHot'];

    protected $attributes = [
        'isHot' => 0,
        'status' => 0,
    ];

    //lấy nhà tuyển dụng
    public function getNhaTuyenDung()
    {
        return $this->belongsTo(NhaTuyenDung::class, 'nha_tuyen_dung_id');
    }


    public function getNhaTuyenDungId()
    {
        return $this->getNhaTuyenDung->pluck('id');
    }

    public function getNganhNghe()
    {
        return $this->belongsToMany(NganhNghe::class, 'bai_tuyen_dung_nganh_nghe', 'bai_tuyen_dung_id', 'nganh_nghe_id');
    }

    public function getNganhNgheId()
    {
        return $this->getNganhNghe->pluck('id');
    }

    public function getDonHang()
    {
        return $this->hasOne(DonHang::class, 'bai_tuyen_dung_id');
    }

    public function getCongTy()
    {
        return $this->belongsTo(CongTy::class, 'cong_ty_id');

    }

    public function getChucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chuc_vu_id');

    }

    public function getKieuLamViec()
    {
        return $this->belongsTo(KieuLamViec::class, 'kieu_lam_viec_id');
    }

    public function getDiaDiem()
    {
        return $this->belongsTo(DiaDiem::class, 'dia_diem_id');
    }

    public function getBangCap()
    {
        return $this->belongsTo(BangCap::class, 'bang_cap_id');
    }

    public function getDuyetTin(){
        return $this->hasOne(DuyetBai::class,'bai_dang_id');
    }

}
