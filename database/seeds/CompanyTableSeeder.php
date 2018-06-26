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
        $company1 = new Company();
        $company1->company_name = 'Intell Access';
        $company1->address_line1 = '107 China Friendship village';
        $company1->address_line2 = 'Kurunduwatta';
        $company1->address_line3 = 'Akmeemana';
        $company1->telephone_no = '0913122504';
        $company1->email = 'intelaccess@gmail.com';
        $company1->status = 1;
        $company1->save();

        $company2 = new Company();
        $company2->company_name = 'ColorAdmin';
        $company2->address_line1 = '556 Matara road';
        $company2->address_line2 = 'Dewata';
        $company2->address_line3 = 'Galle';
        $company2->telephone_no = '0912224633';
        $company2->email = 'coloradmin@gmail.com';
        $company2->status = 1;
        $company2->save();
    }
}
