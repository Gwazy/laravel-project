<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "James (Admin)";
        $user->email = "Admin@gmail.com";
        $user->password = bcrypt("a");
        $user->isAdmin = 1;
        $user->save();

        $user = new User;
        $user->name = "James (User)";
        $user->email = "User@gmail.com";
        $user->password = bcrypt("a");
        $user->isAdmin = 0;
        $user->save();


        $users = User::factory()
            ->count(10)
            ->create();
    }
}
