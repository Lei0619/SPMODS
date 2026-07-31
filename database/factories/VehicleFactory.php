<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\TransportRoute;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => fake()->unique()->regexify('[A-Z]{3}\d{3}'),
            'vehicle_type' => fake()->randomElement(['jeepney', 'bus', 'van', 'taxi']),
            'max_capacity' => fake()->numberBetween(12, 50),
            'driver_id' => Driver::factory(),
            'route_id' => TransportRoute::factory(),
            'status' => fake()->randomElement(['available', 'on_trip', 'maintenance', 'offline']),
        ];
    }
}
