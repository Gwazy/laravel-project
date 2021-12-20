<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Group();
        $comment->name = 'Funny';
        $comment->save();

        $comment = new Group();
        $comment->name = 'All';
        $comment->save();
    }
}
