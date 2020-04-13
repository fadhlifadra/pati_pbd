<?php

use Illuminate\Database\Seeder;
use App\mTrainingCategory;
use App\mTrainingType;
use App\mTrainingCompetency;

class mTrainTypeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*TRAIN COMPETENCE*/

        $train_competence_code = ['HARD','SOFT'];
        
        $train_competence_code = ['HARD','SOFT'];
        $train_competence_name = ['Hard Skill','Soft Skill'];

        foreach($train_competence_code as $key=>$comp_code){
            $exist = mTrainingCompetency::where('competency_code', $comp_code)->first();

            if(!$exist){
                $comp_train = mTrainingCompetency::create([
                    'competency_code' => $comp_code,
                    'description' => $train_competence_name[$key]
                ]);
            }
        }
        
        /*TRAIN TYPE*/

        $train_type_code = ['KHUSUS','UMUM','MANAJERIAL','TEKNIK'];
        
        $train_type_name = ['Khusus','Umum','Manajerial','Teknik'];

        foreach($train_type_code as $key=>$type_code){
            $exist = mTrainingType::where('type_code', $type_code)->first();

            if(!$exist){
                $type_train = mTrainingType::create([
                    'type_code' => $type_code,
                    'description' => $train_type_name[$key]
                ]);
            }
        }

        /* TRAIN CATEGORY */
        $train_category_code = ['PUBLIC','INHOUSE'];
        $train_category_name = ['Public Traning','Inhouse Training'];

        foreach($train_category_code as $key=>$category_code){
            $exist = mTrainingCategory::where('category_code', $category_code)->first();

            if(!$exist){
                $category_train = mTrainingCategory::create([
                    'category_code' => $category_code,
                    'description' => $train_category_name[$key]
                ]);
            }
        }
    }
}
