<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->user_id = '1';
        $comment->post_id = '1';
        $comment->comment = 'I love the Daily Bugle';
        $comment->save();

        $comments = Comment::factory()
            ->count(10)
            ->create();
    }
}
