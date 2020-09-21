<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TaiKhoan extends Authenticatable
{
    use Notifiable;
    protected $table = 'tai_khoan';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ho_ten', 'email', 'password','phone','status','loai'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'status' => 1,
    ];
    public function phan_quyens(){
        return $this->belongsToMany(PhanQuyen::class, 'loai_tai_khoan','account_id','role_id');
//        return $this->hasMany(LoaiTaiKhoan::class,'account_id');
    }
    public function nguoi_tim_viecs(){
        return $this->hasOne(NguoiTimViec::class,'tai_khoan_id');
    }
    public function nha_tuyen_dungs(){
        return $this->hasOne(NhaTuyenDung::class,'tai_khoan_id');
    }

}
