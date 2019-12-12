<?php

use Illuminate\Foundation\Inspiring;
use App\Models\Permission;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


//command for agent
Artisan::command('adminPermissions:create', function () {
    $types = [
        'create',
        'read',
        'update',
        'delete',
    ];

    $modules=[
        'Payroll',
        'invoice'

    ];
    foreach ($modules as $name) {
        foreach ($types as $type) {
            $pername= ucwords($type) . '-' . ucwords($name);
            $display_name= ucwords($type) . ' ' . ucwords($name);
            if (!Permission::where('name', '=', $pername)->exists()) {


                    $this->comment('Creating permissions for ' . $display_name);
                    $permission = new Permission();
                    $permission->name = $pername;
                    $permission->display_name = $display_name;
                    $permission->description = 'User Can '.ucwords($type) . ' ' . ucwords($name);
                    $permission->save();

            } else {
                $this->comment($display_name . ' Permission Already Exist !');
            }
        }
    }


    // the one user who is admin...permission table will consist entry for that user wen we create new permssions..
//    \App\Partner::first()->permissions()->sync(Permission::where('guard_name','partner')->get());
})->describe('Create any non existing permissions from config');