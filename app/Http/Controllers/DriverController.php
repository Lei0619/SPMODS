<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return Driver::with([
            'vehicle',
            'violations',
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

        return response()->json($driver);
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

        return response()->json(null, 204);
    }
}
