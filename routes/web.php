<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::get('/vehicles', [VehicleController::class, 'index'])
    ->name('vehicles.index');
Route::get('/vehicles/create', function () {
    return Inertia::render('Vehicles/Create');
})->name('vehicles.create');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])
    ->name('vehicles.edit');

Route::get('/drivers', [DriverController::class, 'index'])
    ->name('drivers.index');
Route::get('/drivers/create', [DriverController::class, 'create'])
    ->name('drivers.create');
Route::get('/drivers/{driver}/edit', [DriverController::class, 'edit'])
    ->name('drivers.edit');
Route::get('/drivers/{driver}', [DriverController::class, 'show'])
    ->name('drivers.show');

require __DIR__.'/settings.php';
