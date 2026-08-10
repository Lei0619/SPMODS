<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PassengerLogController;
use App\Http\Controllers\TransportRouteController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ViolationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('drivers', DriverController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('transport-routes', TransportRouteController::class);
Route::apiResource('trips', TripController::class);
Route::apiResource('violations', ViolationController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('passenger-logs', PassengerLogController::class);
