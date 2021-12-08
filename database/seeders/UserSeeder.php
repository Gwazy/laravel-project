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
        $user->name = "a";
        $user->email = "a@gmail.com";
        $user->password = bcrypt("a");
        $user->save();

        $users = User::factory()
            ->count(10)
            ->create();
    }
}
