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

    public function getNganhNghe(){
        return $this->belongsToMany(NganhNghe::class,'bai_tuyen_dung_nganh_nghe','bai_tuyen_dung_id','nganh_nghe_id');
    }
    public function getNganhNgheId()
    {
        return $this->getNganhNghe->pluck('id');
    }


}
