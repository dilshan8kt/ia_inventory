<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit1 = new Unit();
        $unit1->company_id = 1;
        $unit1->unit_name = 'NOS';
        $unit1->save();

        $unit2 = new Unit();
        $unit2->company_id = 1;
        $unit2->unit_name = 'KG';
        $unit2->save();

        $unit3 = new Unit();
        $unit3->company_id = 1;
        $unit3->unit_name = 'LITER';
        $unit3->save();

        $unit4 = new Unit();
        $unit4->company_id = 2;
        $unit4->unit_name = 'NOS';
        $unit4->save();

        $unit5 = new Unit();
        $unit5->company_id = 2;
        $unit5->unit_name = 'KG';
        $unit5->save();

        $unit6 = new Unit();
        $unit6->company_id = 2;
        $unit6->unit_name = 'LITER';
        $unit6->save();
    }
}
