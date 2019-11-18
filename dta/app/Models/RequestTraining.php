<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RequestTraining extends Model
{
    const  APPROVE = 1, UN_APPROVE = 0;

    protected $fillable = [
        'user_id',
        'day_1',
        'best_time_1',
        'day_2',
        'best_time_2',
        'day_3',
        'best_time_3',
        'topics',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
