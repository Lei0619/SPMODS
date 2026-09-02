<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@spmods.test'],
            [
                'name' => 'System Administrator',
                'password' => 'password',
            ],
        );

        $admin->assignRole(Role::findOrCreate('admin'));

        User::factory(10)->create();

        $this->call([
            DriverSeeder::class,
            TransportRouteSeeder::class,
            VehicleSeeder::class,
            TripSeeder::class,
            PassengerLogSeeder::class,
            ViolationSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
