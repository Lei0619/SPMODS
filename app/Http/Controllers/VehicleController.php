<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return Vehicle::with([
            'driver',
            'transportRoute',
        ])->get();
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
    public function store(StoreVehicleRequest $request): mixed
    {
        $vehicle = Vehicle::create($request->validated());

        return response()->json(['message' => 'Vehicle created successfully', 'vehicle' => $vehicle], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): mixed
    {
        $vehicle->load([
            'driver',
            'transportRoute',
        ]);

        return response()->json($vehicle);
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
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle): mixed
    {
        $vehicle->update($request->validated());

        return response()->json(['message' => 'Vehicle updated successfully', 'vehicle' => $vehicle]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): mixed
    {
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
