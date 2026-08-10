<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'welcome')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});
Route::get('/vehicles/create', function () {
    return Inertia::render('vehicles/create');
})->name('vehicles.create');

require __DIR__.'/settings.php';
