<?php

use Illuminate\Database\Seeder;
use App\mBloodGroup;

class BloodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_name =['AB','A','B','O'];
        
        foreach($blood_name as $blood){
            $edu = mBloodGroup::create([
                'blood_code'=> strtoupper($blood),
                'blood_name' => $blood
            ]);
        }
    }
}
