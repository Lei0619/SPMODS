<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::query()->each(function (Driver $driver): void {
            Vehicle::factory()->create([
                'driver_id' => $driver->id,
            ]);
        });
    }
}
