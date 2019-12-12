<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'title_name',
        'file_name',
        'folder_name',
        'icon',
        'status',
    ];

//    public function permission()
//    {
//        return $this->hasOne(Permission::class,'module_id','id');
//    }
}
