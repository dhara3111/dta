<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(\App\User::count() == 0)
        {
            \App\User::create([
                'name'=>'Super Admin',
                'email'=>'superadmin@gmail.com',
                'phone'=>'1234567890',
                'street'=>'sama savli road',
                'area'=>'satva avanu',
                'city'=>'vadodara',
                'state'=>'gujarat',
                'country'=>'india',
                'zipcode'=>'390002',
                'expertize_in'=>'developing',
                'service_in_city'=>'vaodara',
                'password'=>bcrypt('123456'),
                'type'=>\App\User::SuperAdmin,
                'status'=>\App\User::ACTIVE,
            ]);

            Artisan  ::call('adminPermissions:create');

        }
    }
}
