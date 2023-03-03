<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'author' => $this->faker->userName,
            'excerpt' => $this->faker->text(300),
            'body' => $this->faker->paragraphs(3, true),
            'category' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->name,

        ];
    }
}
