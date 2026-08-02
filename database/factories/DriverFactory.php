<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    protected $model = \App\Models\Driver::class;

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
