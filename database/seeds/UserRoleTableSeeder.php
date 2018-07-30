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
        $role_super_admin = new Role();
        $role_super_admin->name = 'Super Admin';
        $role_super_admin->description = 'Super Admin';
        $role_super_admin->save();
        
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Admin';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Normal user';
        $role_user->save();
        
        $role_pos_user = new Role();
        $role_pos_user->name = 'POS';
        $role_pos_user->description = 'Normal POS user';
        $role_pos_user->save();
    }
}
