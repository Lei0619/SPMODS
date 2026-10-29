<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PassengerLogController;
use App\Http\Controllers\TransportRouteController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ViolationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('drivers', DriverController::class);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('transport-routes', TransportRouteController::class)
        ->except(['destroy']);
    Route::apiResource('trips', TripController::class)
        ->except(['update', 'destroy']);
    Route::apiResource('violations', ViolationController::class);
    Route::apiResource('notifications', NotificationController::class)
        ->only(['index', 'show']);
    Route::apiResource('passenger-logs', PassengerLogController::class);
});
