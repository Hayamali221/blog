<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
              
        
            'body' => $this->faker->text,
            'user_id' => \App\Models\User::all()->random()->id ,
            'post_id' => \App\Models\Post::all()->random()->id 
        ];
    }
}
