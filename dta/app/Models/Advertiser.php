<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'zipcode',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
