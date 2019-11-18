<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('services.status',self::ACTIVE);
    }
}
