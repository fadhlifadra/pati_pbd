<?php

use Illuminate\Database\Seeder;
use App\mFamType;

class EmpTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fam_code = ['S','I','A'];
        $fam_name = ['Suami','Istri','Anak'];
        
        foreach ($fam_code as $key=>$fc){
            if($fc != 'A'){
                $emp = mFamType::create([
                    'fam_code' => $fc,
                    'fam_name' => $fam_name[$key]
                ]);
            }else{
                for ($i=1;$i<=12;$i++){
                    $emp = mFamType::create([
                        'fam_code' => $fc.$i,
                        'fam_name' => $fam_name[$key] . " " . $i
                    ]); 
                }
            }
        }
    }
}
