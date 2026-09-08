<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Trip;
use App\Models\Violation;
use Inertia\Inertia;

class DriverDashboardController extends Controller
{
    public function index(): mixed
    {
        return Inertia::render('driver/dashboard', [
            'dashboard' => [
                'total_trips' => Trip::count(),
                'total_violations' => Violation::count(),
                'recent_notifications' => Notification::latest()
                    ->take(5)
                    ->get(),
            ],
        ]);
    }
}
