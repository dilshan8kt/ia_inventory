<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_admin = new User();
        $site_admin->company_id = 1;
        $site_admin->first_name = 'Sajana';
        $site_admin->middle_name = 'Suvisitha';
        $site_admin->last_name = 'Maddegoda';
        $site_admin->telephone_no = '0766719189';
        $site_admin->username = 'intelaccess@gmail.com';
        $site_admin->password = bcrypt('12345');
        $site_admin->status = 1;
        $site_admin->save();
    }
}
