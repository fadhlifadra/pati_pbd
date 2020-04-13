<?php

use Illuminate\Database\Seeder;
use App\mObjAudit;

class mObjAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new mObjAudit();
        $obj->code_obj_audit = "TI";
        $obj->name_obj_audit = "Teknologi Informasi";
        $obj->save();
    }
}
