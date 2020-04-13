<?php

use Illuminate\Database\Seeder;
use App\mOrganization;

class mOrgSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_org_code = ['INKA','IMS','REKA','IMST','IMSS','IMSC'];
        $list_org_description = ['PT. Industri Kereta Api (Persero)','PT. INKA MULTI SOLUSI','PT. REKAINDO GLOBAL JASA','PT. INKA MULTI SOLUSI TRADING','PT. INKA MULTI SOLUSI SERVICE','PT. INKA MULTI SOLUSI CONSULTING'];
        $list_parent = [null,1,1,2,2,2];

        foreach($list_org_code as $key => $org_code){
            $org = mOrganization::create([
                'org_code' => $org_code,
                'org_description' => $list_org_description[$key],
                'parent_id' => $list_parent[$key]
            ]);
        }
        
    }
}
