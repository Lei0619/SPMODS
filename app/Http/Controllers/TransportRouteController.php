<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportRoute;
use App\Http\Requests\StoreTransportRouteRequest;
use App\Http\Requests\UpdateTransportRouteRequest;

class TransportRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return TransportRoute::with('vehicles')->get();
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
    public function store(StoreTransportRouteRequest $request): mixed
    {
        $validateData = $request->validated();

        TransportRoute::create($validateData);

        return response()->json(['message' => 'Transport route created successfully', 'transportRoute' => $validateData], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportRoute $transportRoute): mixed
    {
        return response()->json($transportRoute);
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
    public function update(UpdateTransportRouteRequest $request, TransportRoute $transportRoute): mixed
    {
        $transportRoute->update($request->validated());

        return response()->json(['message' => 'Transport route updated successfully', 'transportRoute' => $transportRoute]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportRoute $transportRoute): mixed
    {
        $transportRoute->delete();

        return response()->json(['message' => 'Transport route deleted successfully']);
    }
}
