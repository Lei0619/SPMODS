<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Notification;
use App\Models\Trip;
use App\Models\Vehicle;
use App\Models\Violation;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return response()->json([
            'total_vehicles' => Vehicle::count(),
            'total_drivers' => Driver::count(),
            'total_trips' => Trip::count(),
            'total_violations' => Violation::count(),
            'recent_notifications' => Notification::latest()->take(5)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
