<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Driver;
use App\Models\TransportRoute;
use App\Models\Vehicle;

$driver = Driver::firstOrCreate(
    ['license_number' => 'ABC123'],
    [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone_number' => '123456789',
    ]
);

$route = TransportRoute::firstOrCreate(
    ['route_name' => 'Main Route'],
    [
        'origin' => 'Start',
        'destination' => 'End',
    ]
);

Vehicle::firstOrCreate(
    ['plate_number' => 'ABC-123'],
    [
        'vehicle_type' => 'Bus',
        'max_capacity' => 40,
        'driver_id' => $driver->id,
        'route_id' => $route->id,
        'status' => 'available',
    ]
);

echo "created\n";
