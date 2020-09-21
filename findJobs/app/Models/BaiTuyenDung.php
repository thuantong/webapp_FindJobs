<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiTuyenDung extends Model
{
    protected $table = 'bai_tuyen_dung';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['tieu_de', 'luong', 'han_tuyen', 'so_luong_tuyen', 'gioi_tinh_tuyen', 'bang_cap', 'mo_ta', 'quyen_loi', 'yeu_cau_cong_viec', 'yeu_cau_ho_so', 'ky_nang_basic', 'status', 'isHot'];

    protected $attributes = [
        'isHot' => 0,
        'status' => 0,
        'gioi_tinh' => 1,
    ];
    //
}
