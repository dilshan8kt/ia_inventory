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
        $company = new Company();
        $company->company_name = 'Intell Access';
        $company->address_line1 = '107 China Friendship village';
        $company->address_line2 = 'Kurunduwatta';
        $company->address_line3 = 'Akmeemana';
        $company->telephone_no = '0913122504';
        $company->email = 'intelaccess@gmail.com';
        $company->status = 1;
        $company->save();
    }
}
