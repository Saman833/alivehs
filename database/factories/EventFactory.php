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
            "image"=>$this->faker->imageUrl(),
            "name" => $this->faker->company(),
            "description" => $this->faker->paragraph(),
            "participants" => $this->faker->numberBetween(1,1000),
            "club_id" => $this->faker->numberBetween(1, 10),
            "happening_time" => $this->faker->dateTime(),
        ];
    }
}
