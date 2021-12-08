<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nbUsers = User::count();
        return [
            'user_id' => $this->faker->numberBetween(1, $nbUsers),
            'title' => $this->faker->words(3, true),
            'post' => $this->faker->realText(200, 2),
        ];
    }
}
