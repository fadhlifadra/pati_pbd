<?php

use Illuminate\Database\Seeder;
use App\mEduSchool;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = Excel::selectSheetsByIndex(0)->load('/public/seeder_file/sekolah.xlsx', function($reader){
            //options
        })->get();
        
        $i= 0;
        foreach($rows as $row)
        {
            
            try{
                $school = mEduSchool::create([
                    'inscd' => $row['inscd'],
                    'country_code' => $row['country_code'],
                    'province_code' => $row['province_code'],
                    'city_code' => $row['city_code'],
                    'school_name' => $row['school_name'],
                ]);
            } 

            catch(Exception $e){
                 //ada yg sn nya double dd()
                //  dd($e);
                continue;
            }
            $i++;   
        }
    }
}
