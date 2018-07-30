<?php

use Illuminate\Database\Seeder;
use App\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package1 = new Package();
        $package1->name = 'Full';
        $package1->description = 'Yearly Payment';
        $package1->status = 1;
        $package1->save();
        
        $package2 = new Package();
        $package2->name = 'Monthly';
        $package2->description = 'Monthly Payment';
        $package2->status = 1;
        $package2->save();
    }
}
