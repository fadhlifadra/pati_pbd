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

        $user = new User();
        $user->email = "user@gmail.com";
        $user->nama ="User";
        $user->password = bcrypt('rahasia');
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->email = "user2@gmail.com";
        $user->nama ="User 2";
        $user->password = bcrypt('rahasia');
        $user->role_id = 2;
        $user->save();

    }
}
