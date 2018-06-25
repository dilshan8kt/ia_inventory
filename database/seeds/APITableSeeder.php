<?php

use Illuminate\Database\Seeder;
use App\API;

class APITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = new API();
        $api->company_id = 1;
        $api->api_username = 'company1@api';
        $api->api_password = bcrypt('12345');
        $api->api_status = 1;
        $api->save();
    }
}
