<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\PassengerLog;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Violation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TripApiSecurityTest extends TestCase
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

    public function test_admin_cannot_update_or_delete_a_trip_or_its_historical_records(): void
    {
        $driver = Driver::factory()->create();
        $vehicle = Vehicle::factory()->create([
            'driver_id' => $driver->id,
        ]);
        $trip = Trip::factory()->create([
            'vehicle_id' => $vehicle->id,
            'trip_code' => 'TRIP-HISTORY-001',
            'departure_time' => '2026-10-28 08:00:00',
            'arrival_time' => null,
            'status' => 'Active',
        ]);
        $passengerLog = PassengerLog::query()->create([
            'trip_id' => $trip->id,
            'vehicle_id' => $vehicle->id,
            'passenger_count' => 28,
            'available_seats' => 0,
            'is_full' => true,
            'status' => 'Full',
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
            ->deleteJson('/api/trips/'.$trip->id)
            ->assertStatus(405);

        $this->actingAs($this->admin, 'sanctum')
            ->putJson('/api/trips/'.$trip->id, [
                'trip_code' => 'TRIP-UPDATED-001',
                'status' => 'Completed',
            ])
            ->assertStatus(405);

        $this->actingAs($this->admin, 'sanctum')
            ->patchJson('/api/trips/'.$trip->id, [
                'trip_code' => 'TRIP-PATCHED-001',
                'status' => 'Completed',
            ])
            ->assertStatus(405);

        $this->assertDatabaseHas('trips', [
            'id' => $trip->id,
            'trip_code' => 'TRIP-HISTORY-001',
            'vehicle_id' => $vehicle->id,
            'status' => 'Active',
        ]);
        $this->assertDatabaseHas('vehicles', ['id' => $vehicle->id]);
        $this->assertDatabaseHas('passenger_logs', ['id' => $passengerLog->id]);
        $this->assertDatabaseHas('violations', ['id' => $violation->id]);
        $this->assertDatabaseHas('operational_notifications', [
            'id' => $notificationId,
            'trip_id' => $trip->id,
        ]);
    }

    public function test_admin_can_list_view_and_create_trips(): void
    {
        $existingTrip = Trip::factory()->create([
            'trip_code' => 'TRIP-EXISTING-001',
        ]);
        $vehicle = Vehicle::factory()->create();

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/trips')
            ->assertOk()
            ->assertJsonFragment(['trip_code' => 'TRIP-EXISTING-001']);

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/trips/'.$existingTrip->id)
            ->assertOk()
            ->assertJsonFragment(['trip_code' => 'TRIP-EXISTING-001']);

        $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/trips', [
                'trip_code' => 'TRIP-CREATED-001',
                'vehicle_id' => $vehicle->id,
                'departure_time' => '2026-10-28 09:00:00',
                'arrival_time' => '2026-10-28 10:00:00',
                'status' => 'Completed',
            ])
            ->assertCreated()
            ->assertJsonFragment(['trip_code' => 'TRIP-CREATED-001']);

        $this->assertDatabaseHas('trips', [
            'trip_code' => 'TRIP-CREATED-001',
            'vehicle_id' => $vehicle->id,
            'status' => 'Completed',
        ]);
    }
}
