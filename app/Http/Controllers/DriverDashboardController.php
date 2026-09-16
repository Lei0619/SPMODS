<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DriverDashboardController extends Controller
{
    public function index(): mixed
    {
        $driver = Driver::with('vehicle.transportRoute')
            ->where('users_id', Auth::id())
            ->firstOrFail();

        return Inertia::render('driver/dashboard', [
            'dashboard' => [
                'first_name' => $driver->first_name,
                'last_name' => $driver->last_name,
                'license_number' => $driver->license_number,
                'phone_number' => $driver->phone_number,
                'vehicle' => $driver->vehicle,
                'total_trips' => $driver->vehicle?->trips()->count() ?? 0,
                'total_violations' => $driver->violations()->count(),
                'recent_notifications' => Notification::where('user_id', Auth::id())
                    ->latest()
                    ->take(5)
                    ->get(),
            ],
        ]);
    }
}
