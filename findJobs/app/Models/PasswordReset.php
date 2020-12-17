<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['token','email'];
    //
}
