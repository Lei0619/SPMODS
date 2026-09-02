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
        $allowedCapacity = fake()->numberBetween(20, 60);

        $violationType = fake()->randomElement([
            'overLoad',
            'sensorFailure',
            'unauthorizedStopping',
        ]);

        return [
            'driver_id' => Driver::factory(),
            'vehicle_id' => Vehicle::factory(),
            'trip_id' => Trip::factory(),

            'allowed_capacity' => $allowedCapacity,

            'actual_capacity' => $violationType === 'overLoad'
                ? fake()->numberBetween($allowedCapacity + 1, $allowedCapacity + 20)
                : fake()->numberBetween(1, 80),

            'violation_type' => $violationType,

            'violation_time' => fake()->dateTimeBetween('-1 week', 'now'),
        ];
    }
}
