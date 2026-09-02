<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Notification;
use App\Models\Trip;
use App\Models\Vehicle;
use App\Models\Violation;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): mixed
    {
        return Inertia::render('admin/dashboard', [
            'dashboard' => [
                'total_vehicles' => Vehicle::count(),
                'total_drivers' => Driver::count(),
                'total_trips' => Trip::count(),
                'total_violations' => Violation::count(),
                'recent_notifications' => Notification::latest()
                    ->take(5)
                    ->get(),
            ],
        ]);
    }
}
