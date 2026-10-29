<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Violation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class NotificationApiReadOnlyTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('admin', 'web');
        Role::findOrCreate('driver', 'web');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
    }

    public function test_unauthenticated_users_cannot_list_or_view_notifications(): void
    {
        $this->getJson('/api/notifications')->assertUnauthorized();
        $this->getJson('/api/notifications/1')->assertUnauthorized();
    }

    public function test_non_admin_users_cannot_list_or_view_notifications(): void
    {
        $user = User::factory()->create();
        $user->assignRole('driver');
        $driver = Driver::factory()->create();
        $vehicle = Vehicle::factory()->create([
            'driver_id' => $driver->id,
        ]);
        $trip = Trip::factory()->create([
            'vehicle_id' => $vehicle->id,
        ]);
        $violation = Violation::factory()->create([
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'trip_id' => $trip->id,
        ]);
        $notificationId = $this->createOverloadNotification(
            $vehicle,
            $driver,
            $trip,
            $violation,
        );

        $this->actingAs($user, 'sanctum')
            ->getJson('/api/notifications')
            ->assertForbidden();

        $this->actingAs($user, 'sanctum')
            ->getJson('/api/notifications/'.$notificationId)
            ->assertForbidden();
    }

    public function test_admins_can_list_and_view_notifications_with_related_records(): void
    {
        $driver = Driver::factory()->create();
        $vehicle = Vehicle::factory()->create([
            'driver_id' => $driver->id,
        ]);
        $trip = Trip::factory()->create([
            'vehicle_id' => $vehicle->id,
        ]);
        $violation = Violation::factory()->create([
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'trip_id' => $trip->id,
        ]);
        $notificationId = $this->createOverloadNotification(
            $vehicle,
            $driver,
            $trip,
            $violation,
        );

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/notifications')
            ->assertOk()
            ->assertJsonPath('0.id', $notificationId)
            ->assertJsonPath('0.vehicle.id', $vehicle->id)
            ->assertJsonPath('0.driver.id', $driver->id)
            ->assertJsonPath('0.trip.id', $trip->id)
            ->assertJsonPath('0.violation.id', $violation->id);

        $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/notifications/'.$notificationId)
            ->assertOk()
            ->assertJsonPath('data.id', $notificationId)
            ->assertJsonPath('data.vehicle.id', $vehicle->id)
            ->assertJsonPath('data.driver.id', $driver->id)
            ->assertJsonPath('data.trip.id', $trip->id)
            ->assertJsonPath('data.violation.id', $violation->id);
    }

    public function test_notification_write_endpoints_are_not_available(): void
    {
        $this->actingAs($this->admin, 'sanctum');

        $this->postJson('/api/notifications')->assertStatus(405);
        $this->putJson('/api/notifications/1')->assertStatus(405);
        $this->patchJson('/api/notifications/1')->assertStatus(405);
        $this->deleteJson('/api/notifications/1')->assertStatus(405);
    }

    private function createOverloadNotification(
        Vehicle $vehicle,
        Driver $driver,
        Trip $trip,
        Violation $violation,
    ): int {
        return DB::table('operational_notifications')->insertGetId([
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
    }
}
