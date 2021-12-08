<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $nbUsers = User::count();
        $nbPosts = Post::count();
        return [
            'user_id' => $this->faker->numberBetween(1, $nbUsers),
            'post_id' => $this->faker->numberBetween(1, $nbPosts),
            'comment' => $this->faker->realText(200, 2),
        ];
    }
}
