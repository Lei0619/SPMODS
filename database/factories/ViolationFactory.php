<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use App\Models\Violation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Violation>
 */
class ViolationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'driver_id' => Driver::factory(),
            'vehicle_id' => Vehicle::factory(),
            'trip_id' => Trip::factory(),
            'allowed_capacity' => fake()->numberBetween(20, 60),
            'actual_capacity' => fake()->numberBetween(1, 80),
            'violation_type' => fake()->randomElement(['over_capacity', 'no_seatbelt', 'speeding', 'route_violation']),
            'violation_time' => fake()->dateTimeBetween('-1 week', 'now'),
        ];
    }
}
