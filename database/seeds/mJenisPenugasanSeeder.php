<?php

use Illuminate\Database\Seeder;
use App\mJenisPenugasan;

class mJenisPenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code_penugasan = ['PKPT','nonPKPT','AI','KS','MT'];
        $name_penugasan = ['PKPT','nonPKPT','Audit Investigasi','Konsultatif','Monitoring'];

        foreach($code_penugasan as $key => $code){
            
            $penugasan = mJenisPenugasan::first();
            
                $penugasan = new mJenisPenugasan();
                $penugasan->name_penugasan = $name_penugasan[$key];
                $penugasan->code_penugasan = $code;
                $penugasan->save();
        }
    }
}
