<?php

namespace Database\Factories;

use App\Models\DriverApp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DriverApp>
 */
class DriverAppFactory extends Factory
{
    protected $model = DriverApp::class;

    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'phone_number' => fake()->numerify('09#########'),
            'licence_number' => fake()->unique()->bothify('LIC-#####'),
            'license_type' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'license_expiry_date' => fake()->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
        ];
    }
}
