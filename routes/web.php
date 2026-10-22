<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverAppController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\VehicleController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

// Exnhancement: Create a middleware to not expose the Admin CRUD routes while using dedicated, authenticated API endpoints for the Admin CRUD operations.
// This will prevent unauthorized access to the Admin CRUD routes and ensure that only authenticated users can access them.

// driver-app for admin access
Route::middleware(['auth', 'role:admin'])
    ->prefix('driver-app')
    ->group(function () {
        Route::get('/', [DriverAppController::class, 'index'])
            ->name('driver-app.index');
        Route::get('/create', [DriverAppController::class, 'create'])
            ->name('driver-app.create');
        Route::post('/', [DriverAppController::class, 'store'])
            ->name('driver-app.store');
        Route::get('/{id}', [DriverAppController::class, 'show'])
            ->name('driver-app.show');
        Route::get('/{id}/edit', [DriverAppController::class, 'edit'])
            ->name('driver-app.edit');
        Route::put('/{id}', [DriverAppController::class, 'update'])
            ->name('driver-app.update');
        Route::delete('/{id}', [DriverAppController::class, 'destroy'])
            ->name('driver-app.destroy');
    });

// admin dashboard routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});

// admin's vehicle routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index'])
        ->name('vehicles.index');
    Route::get('/vehicles/create', function () {
        return Inertia::render('Vehicles/Create');
    })->name('vehicles.create');
    Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])
        ->name('vehicles.edit');
});

// driver routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/drivers', [DriverController::class, 'index'])
        ->name('drivers.index');
    Route::get('/admin/drivers/create', [DriverController::class, 'create'])
        ->name('drivers.create');
    Route::get('/admin/drivers/{driver}/edit', [DriverController::class, 'edit'])
        ->name('drivers.edit');
    Route::get('/drivers/{driver}', [DriverController::class, 'show'])
        ->name('drivers.show');
});

Route::get('/gform', function () {
    return Inertia::render('gform');
})->name('gform');

// admin and driver dashboard routes and authentication
Route::get('/dashboard', function () {
    $user = Auth::user();

    abort_unless($user instanceof User, 403);

    /** @var User $user */
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    if ($user->hasRole('driver')) {
        return redirect()->route('driver.dashboard');
    }

    return Inertia::render('dashboard');
})->middleware(['auth'])->name('dashboard');

// driver dashboard routes
Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])
        ->name('driver.dashboard');
});

require __DIR__.'/settings.php';
