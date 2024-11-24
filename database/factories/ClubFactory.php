<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(), // Generates a realistic club name
            'description' => fake()->paragraph(), // Generates a descriptive paragraph
            'number_of_members' => fake()->numberBetween(10, 100), // Random number of members
            'owner_id' => fake()->numberBetween(0,20), // Creates a related user as the owner
        ];
    }
}
