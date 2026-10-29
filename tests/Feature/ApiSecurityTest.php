<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ApiSecurityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('admin', 'web');
        Role::findOrCreate('driver', 'web');
    }

    public function test_guest_cannot_access_protected_api_routes(): void
    {
        $this->getJson('/api/drivers')->assertStatus(401);
        $this->getJson('/api/vehicles')->assertStatus(401);
        $this->getJson('/api/users')->assertStatus(401);
    }

    public function test_non_admin_cannot_manage_users(): void
    {
        $user = User::factory()->create();
        $user->assignRole('driver');

        $this->actingAs($user, 'sanctum')
            ->getJson('/api/users')
            ->assertStatus(403);

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/users', [
                'name' => 'Test User',
                'email' => 'test-user@example.com',
                'password' => 'Password123!',
                'password_confirmation' => 'Password123!',
            ])
            ->assertStatus(403);
    }

    public function test_admin_user_creation_rejects_role_assignment(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->actingAs($admin, 'sanctum')
            ->postJson('/api/users', [
                'name' => 'Test Admin User',
                'email' => 'admin-user@example.com',
                'password' => 'Password123!',
                'password_confirmation' => 'Password123!',
                'role' => 'admin',
            ])
            ->assertStatus(422);
    }

    public function test_driver_can_only_access_own_driver_record(): void
    {
        $driverUser = User::factory()->create();
        $driverUser->assignRole('driver');

        $ownDriver = Driver::factory()->create([
            'users_id' => $driverUser->id,
        ]);

        $otherDriver = Driver::factory()->create();

        $this->actingAs($driverUser, 'sanctum')
            ->getJson('/api/drivers/'.$ownDriver->id)
            ->assertOk();

        $this->actingAs($driverUser, 'sanctum')
            ->putJson('/api/drivers/'.$ownDriver->id, [
                'first_name' => 'Updated',
                'last_name' => 'Driver',
                'license_number' => 'LIC-99999',
                'phone_number' => '09999999999',
                'status' => 'active',
            ])
            ->assertOk();

        $this->actingAs($driverUser, 'sanctum')
            ->getJson('/api/drivers/'.$otherDriver->id)
            ->assertStatus(403);

        $this->actingAs($driverUser, 'sanctum')
            ->putJson('/api/drivers/'.$otherDriver->id, [
                'first_name' => 'Nope',
                'last_name' => 'Nope',
                'license_number' => 'LIC-77777',
                'phone_number' => '09999999998',
                'status' => 'active',
            ])
            ->assertStatus(403);
    }

    public function test_admin_can_manage_driver_records(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $driver = Driver::factory()->create();

        $this->actingAs($admin, 'sanctum')
            ->getJson('/api/drivers')
            ->assertOk();

        $this->actingAs($admin, 'sanctum')
            ->postJson('/api/drivers', [
                'first_name' => 'Admin',
                'last_name' => 'Created',
                'license_number' => 'LIC-12345',
                'phone_number' => '09000000000',
                'status' => 'active',
            ])
            ->assertStatus(201);

        $this->actingAs($admin, 'sanctum')
            ->getJson('/api/drivers/'.$driver->id)
            ->assertOk();
    }
}
