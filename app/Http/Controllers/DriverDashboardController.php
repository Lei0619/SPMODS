<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Notification;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DriverDashboardController extends Controller
{
    public function index(): mixed
    {
        $driver = Driver::where('users_id', Auth::id())->first();

        return Inertia::render('driver/dashboard', [
            'dashboard' => [
                'phone_number' => $driver->phone_number,
                'vehicle' => $driver->vehicle,
                'total_trips' => $driver->vehicle?->trips()->count() ?? 0,
                'total_violations' => Violation::whereIn('trip_id', $driver->vehicle?->trips()->pluck('id') ?? [])->count(),
                'recent_notifications' => Notification::latest()
                    ->where('user_id', Auth::id())
                    ->take(5)
                    ->get(),
            ],
        ]);
    }
}
