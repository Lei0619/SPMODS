<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\StoreDriverRequest;
use App\Http\Requests\Driver\UpdateDriverRequest; // route-model binding
use App\Models\Driver;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::query()
            ->with('vehicle')
            ->withCount('violations')
            ->get();

        return response()->json(['data' => $drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request): JsonResponse
    {
        $driver = Driver::create($request->validated());

        return response()->json([
            'message' => 'Driver created successfully',
            'data' => $driver,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver): JsonResponse
    {
        $driver->load([
            'vehicle',
            'violations',
        ]);

        return response()->json(['data' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver): JsonResponse
    {
        $driver->update($request->validated());

        return response()->json([
            'message' => 'Driver updated successfully',
            'data' => $driver,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver): JsonResponse
    {
        $driver->delete();

        return response()->json([
            'message' => 'Driver deleted successfully',
        ]);
    }
}
