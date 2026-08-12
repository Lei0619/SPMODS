<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'welcome')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::get('/vehicles', [VehicleController::class, 'index'])
    ->name('vehicles.index');
Route::get('/vehicles/create', function () {
    return Inertia::render('vehicles/create');
})->name('vehicles.create');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])
    ->name('vehicles.edit');

require __DIR__.'/settings.php';
