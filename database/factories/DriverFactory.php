<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Driver>
 */
class DriverFactory extends Factory
{
    protected $model = Driver::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'license_number' => fake()->unique()->bothify('LIC-#####'),
            'phone_number' => fake()->numerify('09#########'),
            'status' => 'active',
        ];
    }
}
