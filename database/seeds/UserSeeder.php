<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = "admin@gmail.com";
        $user->nama ="Admin";
        $user->password = bcrypt('rahasia');
        $user->role_id = 1;
        $user->save();

    }
}
