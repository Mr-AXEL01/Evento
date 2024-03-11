<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
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
            'cover' => 'event.jpg',
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->city,
            'place' => $this->faker->numberBetween(20, 1000),
            'status' => $this->faker->randomElement(['approved', 'pending', 'refused']),
            'reservation_mode' => $this->faker->randomElement(['automatic', 'manual']),
            'organiser_id' => \App\Models\Organiser::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
