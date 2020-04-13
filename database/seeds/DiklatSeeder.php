<?php

use Illuminate\Database\Seeder;

class DiklatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(mOrgSeed::class);
        $this->call(AdminTrainingSeeder::class);
        $this->call(mTrainTypeCategorySeeder::class);
        $this->call(TrainingAttachmentTypeSeeder::class);
    }
}
