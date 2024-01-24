<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => fake()->realText(25),
            'slug' => fake()->slug(3),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '<p/>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '<p/>',
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
