<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\PassengerLog;
use App\Models\TransportRoute;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Violation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TransportRouteSecurityTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('admin', 'web');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
    }

    public function test_admin_cannot_delete_a_route_or_its_linked_operational_records(): void
    {
        $route = TransportRoute::factory()->create();
        $driver = Driver::factory()->create();
        $vehicle = Vehicle::factory()->create([
            'driver_id' => $driver->id,
            'route_id' => $route->id,
        ]);
        $trip = Trip::factory()->create([
            'vehicle_id' => $vehicle->id,
        ]);
        $passengerLog = PassengerLog::query()->create([
            'trip_id' => $trip->id,
            'vehicle_id' => $vehicle->id,
            'passenger_count' => 10,
            'available_seats' => 10,
            'is_full' => false,
            'status' => 'Available',
        ]);
        $violation = Violation::factory()->create([
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'trip_id' => $trip->id,
        ]);
        $notificationId = DB::table('operational_notifications')->insertGetId([
            'vehicle_id' => $vehicle->id,
            'driver_id' => $driver->id,
            'trip_id' => $trip->id,
            'violation_id' => $violation->id,
            'user_id' => $this->admin->id,
            'title' => 'Overload alert',
            'message' => 'Passenger capacity exceeded.',
            'type' => 'overloading',
            'is_read' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->actingAs($this->admin, 'sanctum')
            ->deleteJson('/api/transport-routes/'.$route->id)
            ->assertStatus(405);

        $this->assertDatabaseHas('transport_routes', ['id' => $route->id]);
        $this->assertDatabaseHas('vehicles', ['id' => $vehicle->id]);
        $this->assertDatabaseHas('trips', ['id' => $trip->id]);
        $this->assertDatabaseHas('passenger_logs', ['id' => $passengerLog->id]);
        $this->assertDatabaseHas('violations', ['id' => $violation->id]);
        $this->assertDatabaseHas('operational_notifications', ['id' => $notificationId]);
    }

    public function test_admin_can_list_view_create_and_update_routes(): void
    {
        $route = TransportRoute::factory()->create([
            'route_name' => 'Existing Route',
            'origin' => 'North Terminal',
            'destination' => 'South Terminal',
        ]);

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/transport-routes')
            ->assertOk()
            ->assertJsonFragment(['route_name' => 'Existing Route']);

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/transport-routes/'.$route->id)
            ->assertOk()
            ->assertJsonFragment(['route_name' => 'Existing Route']);

        $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/transport-routes', [
                'route_name' => 'New Route',
                'origin' => 'East Terminal',
                'destination' => 'West Terminal',
            ])
            ->assertCreated();

        $createdRoute = TransportRoute::query()
            ->where('route_name', 'New Route')
            ->firstOrFail();

        $this->actingAs($this->admin, 'sanctum')
            ->putJson('/api/transport-routes/'.$createdRoute->id, [
                'route_name' => 'Updated Route',
                'origin' => 'East Station',
                'destination' => 'West Station',
            ])
            ->assertOk();

        $this->assertDatabaseHas('transport_routes', [
            'id' => $createdRoute->id,
            'route_name' => 'Updated Route',
            'origin' => 'East Station',
            'destination' => 'West Station',
        ]);
    }
}
