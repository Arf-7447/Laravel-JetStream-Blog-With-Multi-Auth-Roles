<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->sentence(3);

        // Generate a body with exactly 150 words
        $body = implode(' ', $this->faker->paragraphs(12));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'author_id' => [2, 4][rand(0, 1)], // Randomly select between 2 and 4
            'campus_id' => [1, 2, 3, 4, 5][array_rand([1, 2, 3, 4, 5])], // Randomly select one element from the array
            'categories_id' => [1, 2, 3][array_rand([1, 2, 3])], // Randomly select one element from the array
            'body' => $body
        ];
    }
}
