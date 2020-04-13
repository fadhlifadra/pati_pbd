<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\mOrganization;
use Carbon\Carbon;
use App\User;

class AdminTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diklatSdmRole  = Role::where('name', 'admin_diklat_inka')->first();

        if(!$diklatSdmRole){
            $diklatSdmRole = new Role();
            $diklatSdmRole->name = "admin_diklat_inka";
            $diklatSdmRole->display_name = "Admin Diklat INKA";
            $diklatSdmRole->save();
        }

        $org = mOrganization::where('org_code','INKA')->first();

        $user = new User();
            $user->org_id = $org->id;
            $user->join_org_id = $org->id;
            $user->name = "Admin SPI " . $org->org_code;
            $user->nip = "admin_spi_" . $org->org_code;
            $user->email = "admin_spi_" . $org->org_code . '@inkagroup.id';
            $user->password = bcrypt('spi19');
            $user->sex = "L";
            $user->address = "Jalan Yos Sudarso";
            $user->address_city = "Madiun";
            $birth = Carbon::today()->subYear(25)->toDateString();
            $user->birthday = $birth;
            $user->birth_city = "Madiun";
            $user->nik = 9990000000000 ;
            $user->phone_number = 200000000000 ;
            // $user->photo_path = "/";
            $user->join_date = Carbon::today()->toDateString();
            $user->save();

            if(!$user->hasRole($diklatSdmRole))
                $user->attachRole($diklatSdmRole);
    }
}
