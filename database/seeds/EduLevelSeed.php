<?php

use Illuminate\Database\Seeder;
use App\mEducation;

class EduLevelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_edu_code = ['SD','SMP','SMA','SMK','D1','D2','D3','D4','S1','S2','S3'];
        $list_edu_name =['Sekolah Dasar','Sekolah Menengah Pertama','Sekolah Menengah Atas',
        'Sekolah Menengah Kejuruan','Diploma 1','Diploma 2','Diploma 3','Diploma 4','Sarjana','Magister','Doktor'];

        foreach($list_edu_code as $key => $edu_code){
            $edu = mEducation::create([
                'edu_code'=> $edu_code,
                'edu_name' => $list_edu_name[$key]
            ]);
        }
    }
}
