<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trip\StoreTripRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $this->requireAdmin();

        return Trip::with([
            'vehicle',
            'passengerLogs',
            'violations',
        ])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request): mixed
    {
        $this->requireAdmin();

        $trip = Trip::create($request->validated());

        return response()->json(['message' => 'Trip created successfully', 'trip' => $trip], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip): mixed
    {
        $this->requireAdmin();

        return response()->json($trip);
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
    public function destroy(Trip $trip): mixed
    {
        $this->requireAdmin();

        $trip->delete();

        return response()->json(['message' => 'Trip deleted successfully']);
    }
}
