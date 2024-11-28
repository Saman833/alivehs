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
            'name' => $this->faker->company(), // Generates a realistic club name
            'image'=>$this->faker->imageUrl(),
            'description' => $this->faker->paragraph(), // Generates a descriptive paragraph
            'number_of_members' => $this->faker->numberBetween(10, 100), // Random number of members
            'owner_id' => \App\Models\User::inRandomOrder()->first()->id // Creates a related user as the owner
        ];
    }
}
