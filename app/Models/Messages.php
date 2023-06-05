<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $table = 'messages';

    public function sender(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Users::class,'user_id','sender_id');
    }
    public function receiver(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Users::class,'user_id','receive_id');
    }
}
