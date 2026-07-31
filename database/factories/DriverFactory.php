<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
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