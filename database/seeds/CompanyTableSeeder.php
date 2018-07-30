<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_company = new Company();
        $site_company->company_name = 'Intell Access';
        $site_company->address_line1 = 'No.107 China Friendship village';
        $site_company->address_line2 = 'Kurunduwatta';
        $site_company->address_line3 = 'Akmeemana';
        $site_company->telephone_no = '0913122504';
        $site_company->email = 'intelaccess@gmail.com';
        $site_company->status = 1;
        $site_company->save();
    }
}
