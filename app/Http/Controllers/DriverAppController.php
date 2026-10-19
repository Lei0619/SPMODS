<?php

namespace App\Http\Controllers;

use App\Events\DriverApplicationSubmitted;
use App\Http\Requests\StoreDriverAppRequest;
use App\Http\Requests\UpdateDriverAppRequest;
use App\Models\DriverApp;
use Inertia\Inertia;

class DriverAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $driverApp = DriverApp::all();

        return response()->json($driverApp);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): mixed
    {
        return Inertia::render('DriverApp/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverAppRequest $request): mixed
    {
        $validatedData = $request->validated();

        $driverApp = DriverApp::create([
            'full_name' => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'license_number' => $validatedData['license_number'],
            'license_type' => $validatedData['license_type'],
            'license_expiry_date' => $validatedData['license_expiry_date'],
        ]);

        $driverApp = DriverApp::findOrFail($driverApp->id);
        DriverApplicationSubmitted::dispatch($driverApp);

        return response()->json($driverApp, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): mixed
    {
        return response()->json(DriverApp::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): mixed
    {
        return Inertia::render('DriverApp/Edit', [
            'driverApp' => DriverApp::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverAppRequest $request, string $id): mixed
    {
        $driverApp = DriverApp::findOrFail($id);
        $driverApp->update($request->validated());

        return response()->json($driverApp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): mixed
    {
        $driverApp = DriverApp::findOrFail($id);
        $driverApp->delete();

        return response()->json(['message' => 'Driver app deleted successfully'], 204);
    }
}
