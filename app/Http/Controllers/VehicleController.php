<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\StoreVehicleRequest;
use App\Http\Requests\Vehicle\UpdateVehicleRequest;
use App\Models\Vehicle;
use Inertia\Inertia;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $this->requireAdmin();

        return Inertia::render('vehicles/index', [
            'vehicles' => Vehicle::with([
                'driver',
                'transportRoute',
            ])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request): mixed
    {
        $this->requireAdmin();

        $vehicle = Vehicle::create($request->validated());

        return response()->json(['message' => 'Vehicle created successfully', 'vehicle' => $vehicle], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): mixed
    {
        $this->requireAdmin();

        $vehicle->load([
            'driver',
            'transportRoute',
        ]);

        return Inertia::render('vehicles/show', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle): mixed
    {
        $this->requireAdmin();

        $vehicle->load([
            'driver',
            'transportRoute',
        ]);

        return Inertia::render('vehicles/edit', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle): mixed
    {
        $this->requireAdmin();

        $vehicle->update($request->validated());

        return response()->json(['message' => 'Vehicle updated successfully', 'vehicle' => $vehicle]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): mixed
    {
        $this->requireAdmin();

        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
