<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiTimViecModel extends Model
{
    protected $table = 'nguoi_tim_viecs';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['ho_ten', 'cong_viec_tim', 'gioi_thieu', 'dia_chi', 'gioi_tinh', 'ngay_sinh', 'skill_basic', 'kinh_nghiem', 'project', 'loai_cong_viec_muon', 'vi_tri_muon', 'so_thich', 'status', 'avatar', 'bai_dang_like_ids', 'nha_tuyen_dung_theo_doi_ids', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    //
}
