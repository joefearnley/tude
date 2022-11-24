<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->realText(20),
            'complete' => rand(0,1) === 1,
            'due_date' => rand(0,1) === 1 ? null : Carbon::today()->subDays(rand(0, 30)),
        ];
    }
}
