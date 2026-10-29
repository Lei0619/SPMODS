<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\TransportRoute;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class VehicleTypeTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    private User $driverUser;

    private Driver $driver;

    private TransportRoute $transportRoute;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('admin', 'web');
        Role::findOrCreate('driver', 'web');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $this->driverUser = User::factory()->create();
        $this->driverUser->assignRole('driver');

        $this->driver = Driver::factory()->create();
        $this->transportRoute = TransportRoute::factory()->create();
    }

    public function test_admin_can_create_a_jeepney_and_omitting_type_uses_the_default(): void
    {
        $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/vehicles', $this->validVehicleData([
                'plate_number' => 'JPN-1001',
                'vehicle_type' => 'jeepney',
            ]))
            ->assertCreated();

        $this->assertDatabaseHas('vehicles', [
            'plate_number' => 'JPN-1001',
            'vehicle_type' => 'jeepney',
        ]);

        $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/vehicles', $this->validVehicleData([
                'plate_number' => 'JPN-1002',
            ]))
            ->assertCreated();

        $this->assertDatabaseHas('vehicles', [
            'plate_number' => 'JPN-1002',
            'vehicle_type' => 'jeepney',
        ]);
    }

    public function test_admin_cannot_create_a_vehicle_with_a_non_jeepney_type(): void
    {
        foreach (['bus', 'van', 'taxi', 'spaceship', null] as $index => $vehicleType) {
            $this->actingAs($this->admin, 'sanctum')
                ->postJson('/api/vehicles', $this->validVehicleData([
                    'plate_number' => 'JPN-20'.($index + 1),
                    'vehicle_type' => $vehicleType,
                ]))
                ->assertUnprocessable()
                ->assertJsonValidationErrors('vehicle_type');
        }
    }

    public function test_admin_can_update_a_vehicle_to_jeepney(): void
    {
        $vehicle = Vehicle::factory()->create([
            'vehicle_type' => 'jeepney',
        ]);

        $this->actingAs($this->admin, 'sanctum')
            ->putJson('/api/vehicles/'.$vehicle->id, [
                'vehicle_type' => 'jeepney',
            ])
            ->assertOk();

        $this->assertDatabaseHas('vehicles', [
            'id' => $vehicle->id,
            'vehicle_type' => 'jeepney',
        ]);
    }

    public function test_admin_cannot_update_a_vehicle_to_a_non_jeepney_type(): void
    {
        $vehicle = Vehicle::factory()->create([
            'vehicle_type' => 'jeepney',
        ]);

        foreach (['bus', 'van', 'taxi', 'spaceship', null] as $vehicleType) {
            $this->actingAs($this->admin, 'sanctum')
                ->putJson('/api/vehicles/'.$vehicle->id, [
                    'vehicle_type' => $vehicleType,
                ])
                ->assertUnprocessable()
                ->assertJsonValidationErrors('vehicle_type');
        }

        $this->assertDatabaseHas('vehicles', [
            'id' => $vehicle->id,
            'vehicle_type' => 'jeepney',
        ]);
    }

    public function test_vehicle_authorization_remains_effective(): void
    {
        $vehicle = Vehicle::factory()->create([
            'vehicle_type' => 'jeepney',
        ]);

        $this->postJson('/api/vehicles', $this->validVehicleData([
            'vehicle_type' => 'jeepney',
        ]))->assertUnauthorized();

        $this->actingAs($this->driverUser, 'sanctum')
            ->postJson('/api/vehicles', $this->validVehicleData([
                'vehicle_type' => 'jeepney',
            ]))
            ->assertForbidden();

        $this->actingAs($this->driverUser, 'sanctum')
            ->putJson('/api/vehicles/'.$vehicle->id, [
                'vehicle_type' => 'jeepney',
            ])
            ->assertForbidden();

        $this->assertDatabaseHas('vehicles', [
            'id' => $vehicle->id,
            'vehicle_type' => 'jeepney',
        ]);
    }

    public function test_vehicle_factory_defaults_to_jeepney(): void
    {
        $this->assertSame('jeepney', Vehicle::factory()->make()->vehicle_type);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validVehicleData(array $overrides = []): array
    {
        return array_merge([
            'plate_number' => 'JPN-1000',
            'max_capacity' => 20,
            'driver_id' => $this->driver->id,
            'route_id' => $this->transportRoute->id,
            'status' => 'available',
        ], $overrides);
    }
}
