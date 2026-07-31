<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$vehicle = App\Models\Vehicle::with('driver')->first();

echo $vehicle ? $vehicle->plate_number : 'no vehicle';
echo PHP_EOL;
