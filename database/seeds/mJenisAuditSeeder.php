<?php

use Illuminate\Database\Seeder;
use App\mJenisAudit;

class mJenisAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $audit = new mJenisAudit();
        $audit->code_jenis_audit = "AK";
        $audit->name_jenis_audit = "Audit Kerja";
        $audit->save();
    }
}
