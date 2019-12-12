<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
//    use SoftDeletes;

    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'name',
        'hsn_code',
        'price',
        'qty',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('items.status',self::ACTIVE);
    }
}
