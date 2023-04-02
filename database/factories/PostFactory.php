<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\User;
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
        $user = User::all()->random();
        $body = $this->faker->paragraphs(5, true);
        return [
            'title' => $this->faker->sentence,
            'user_id' => $user->id,
            'author' => $user->name,
            'excerpt' => $this->faker->text(300),
            'body' => $body,
            'bodysearch' => $body,
            'category_id' => category::all()->random()->id,
            'category' => category::all()->random()->category,
            'approved'=>true

        ];
    }
}
