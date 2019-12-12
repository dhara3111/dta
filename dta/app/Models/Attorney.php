<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attorney extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'area_id',
        'city_id',
        'state_id',
        'country_id',
        'zipcode',
        'expertize_in',
        'service_in__city',
        'status',
    ];

}
