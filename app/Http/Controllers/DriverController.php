<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use Inertia\Inertia;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return Inertia::render('drivers/index', [
            'drivers' => Driver::with([
                'vehicle',
                'violations',
            ])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): mixed
    {
        return Inertia::render('drivers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request): mixed
    {
        $driver = Driver::create($request->validated());

        return response()->json($driver, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver): mixed
    {
        $driver->load([
            'vehicle',
            'violations',
        ]);

        return Inertia::render('drivers/show', [
            'driver' => $driver,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver): mixed
    {
        $driver->load([
            'vehicle',
            'violations',
        ]);

        return Inertia::render('drivers/edit', [
            'driver' => $driver,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver): mixed
    {
        $driver->update($request->validated());

        return response()->json($driver);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver): mixed
    {
        $driver->delete();

        return response()->json(['message' => 'Driver deleted successfully'], 204);
    }
}
