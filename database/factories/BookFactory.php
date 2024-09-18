<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'country_id' => $this->faker->numberBetween(1, 100),
            'stocks' => $this->faker->numberBetween(1, 500),
            'amount' => $this->faker->randomFloat(2, 5, 100),
            'photo' => $this->faker->imageUrl(640, 480, 'books', true),
        ];
    }
}
