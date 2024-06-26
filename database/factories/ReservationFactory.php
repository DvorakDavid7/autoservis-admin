<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hours = $this->faker->numberBetween(0, 23);
        $minutes = $this->faker->randomElement([0, 15, 30, 45]);
        $formattedTime = Carbon::createFromTime($hours, $minutes)->format('m/d/Y H:i');

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'date' => $formattedTime,
            'service' => fake()->domainName(),
            'note' => fake()->text(),
            'notified' => false,
        ];
    }
}
