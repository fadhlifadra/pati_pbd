<?php

use Illuminate\Database\Seeder;
use App\mReligion;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religion_name =['Islam','Katolik','Kristen','Hindu','Budha'];
        
        foreach($religion_name as $religion){
            $edu = mReligion::create([
                'religion_code'=> strtoupper($religion),
                'religion_name' => $religion
            ]);
        }
    }
}
