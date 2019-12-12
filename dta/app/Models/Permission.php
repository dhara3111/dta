<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    const ACTIVE = 1, IN_ACTIVE = 0;
    protected $fillable = [
        'user_id',
        'module_id',
        'view',
        'add',
        'edit',
        'delete',

    ];

    public function module()
    {
        return $this->hasOne(Module::class,'id','module_id');
    }
}
