<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departure = fake()->dateTimeBetween('-1 week', 'now');

        return [
            'trip_code' => fake()->unique()->bothify('TRIP-#####'),
            'vehicle_id' => Vehicle::factory(),
            'departure_time' => $departure,
            'arrival_time' => fake()->optional()->dateTimeBetween($departure, '+1 day'),
            'status' => fake()->randomElement(['Active', 'Completed']),
        ];
    }
}
