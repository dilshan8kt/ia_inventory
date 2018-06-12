<?php

use Illuminate\Database\Seeder;
use App\Role;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Normal user role';
        $role_user->save();

        
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Admin role';
        $role_admin->save();
    }
}
