<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->user_id = '1';
        $post->title = 'Extra! Extra! Read all about it!';
        $post->post = 'University teaches students PHP!! Meanwhile in 2021, Spiderman..';
        $post->save();

        $post = new Post;
        $post->user_id = '1';
        $post->title = 'Extra! Extra! Read all about it!';
        $post->post = 'University teaches students PHP!! Meanwhile in 2021, Spiderman..';
        $post->save();

        $posts = Post::factory()
            ->count(10)
            ->create();
    }
}
