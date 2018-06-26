<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->company_id = 1;
        $admin->first_name = 'Tharindu';
        $admin->middle_name = 'Dilshan';
        $admin->last_name = 'Kosgamage';
        $admin->telephone_no = '0774586759';
        $admin->username = 'dilshan.kt@gmail.com';
        $admin->password = bcrypt('12345');
        $admin->status = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->company_id = 2;
        $user->first_name = 'Sajana';
        $user->middle_name = 'Suvisitha';
        $user->last_name = 'Maddegoda';
        $user->telephone_no = '0766719189';
        $user->username = 'ssuvisitha@gmail.com';
        $user->password = bcrypt('12345');
        $user->status = 1;
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
