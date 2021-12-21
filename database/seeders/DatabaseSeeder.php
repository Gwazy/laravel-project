<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);

        $user1 = User::first();
        $user2 = User::skip(1)->take(1)->first();
        $group1 = Group::first();
        $group2 = Group::skip(1)->take(1)->first();

        $user1->group()->attach($group1);
        $user1->group()->attach($group2);
        $user2->group()->attach($group1);

        echo ($user1->group[0]->name);
        echo ($user2->group[0]->name);
    }
}
