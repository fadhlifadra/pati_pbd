<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
       // $this->call(mJenisAuditSeeder::class);
       // $this->call(mJenisPenugasanSeeder::class);
       // $this->call(mJenisTemuanSeeder::class);
        //$this->call(mObjAuditSeeder::class);
       // $this->call(mBagUnitSeeder::class);
        $this->call(UserSeeder::class);
    }
}
