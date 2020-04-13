<?php

use Illuminate\Database\Seeder;
use App\mEduMayor;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = Excel::selectSheetsByIndex(0)->load('/public/seeder_file/edu_mayor.xlsx', function($reader){
            //options
        })->get();
        
        $i= 0;
        foreach($rows as $row)
        {
            
            try{
                $edu = mEduMayor::where('mayor_name','like', $row['nama_jurusan'])->first();
                
                if(!$edu){
                    $edu = mEduMayor::create([
                        'mayor_name' => $row['nama_jurusan'],
                        'mayor_code' => $row['kode_jurusan'],
                    ]);
                    
                }
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
