<?php

use App\Models\Vehicle;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$vehicle = Vehicle::with('driver')->first();

echo $vehicle ? $vehicle->plate_number : 'no vehicle';
echo PHP_EOL;
