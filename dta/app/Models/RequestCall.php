<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RequestCall extends Model
{
    const  APPROVE = 1, UN_APPROVE = 0;

    protected $fillable = [
        'user_id',
        'phone',
        'time_to_call',
        'request_info',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
