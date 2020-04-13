<?php

use Illuminate\Database\Seeder;
use App\mBank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = Excel::selectSheetsByIndex(0)->load('/public/seeder_file/kode_bank.xlsx', function($reader){
            //options
        })->get();
        
        $i= 0;
        foreach($rows as $row)
        {
            
            try{
                $bank = mBank::create([
                    'bank_name' => $row['bank_name'],
                    'bank_code' => $row['bank_code'],
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
