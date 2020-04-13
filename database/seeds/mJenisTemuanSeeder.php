<?php

use Illuminate\Database\Seeder;
use App\mJenisTemuan;

class mJenisTemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code_jenis_temuan = ['INF','ADM','KP','OFI','SDM','KPH'];
        $name_jenis_temuan = ['Inefisiensi','Administrasi','Kerugian Perusahaan','Opportunity For Improvement','Sumber Daya Manusia','Kepatuhan'];

        foreach($code_jenis_temuan as $key => $code){
            
            $temuan = mJenisTemuan::first();
            
                $temuan = new mJenisTemuan();
                $temuan->name_jenis_temuan = $name_jenis_temuan[$key];
                $temuan->code_jenis_temuan = $code;
                $temuan->save();
        }
    }
}
