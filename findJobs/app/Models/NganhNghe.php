<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhNghe extends Model
{
    protected $table = 'nganh_nghe';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'mo_ta'];
    //
//    public function nh(){
//        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
//    }
}
