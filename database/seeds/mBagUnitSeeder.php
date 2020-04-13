<?php

use Illuminate\Database\Seeder;
use App\mBagUnit;

class mBagUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bag = new mBagUnit();
        $bag->code_bag_unit = "P&TIT";
        $bag->name_bag_unit = "Perencanaan & Tata Kelola IT";
        $bag->obj_audit_id = 1;
        $bag->save();
    }
    
}
