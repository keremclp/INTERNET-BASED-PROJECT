<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $table = 'password_reset';
    protected $primaryKey = 'reset_id';

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Users::class,'user_id','user_id');
    }
}
