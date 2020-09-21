<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chuc_vu';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'text'];
    //
}
