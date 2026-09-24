<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverAppRequest;
use App\Models\DriverApp;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DriverAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driverApp = DriverApp::with('transport_routes')->get();

        return Inertia::render('DriverApp/Index', [
            'driverApps' => $driverApp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverAppRequest $request)
    {
        $validateData = $request->validated();

        $driverApp = DriverApp::create([
            'full_name' => $validateData['full_name'],
            'phone_number' => $validateData['phone_number'],
            'license_number' => $validateData['license_number'],
            'license_type' => $validateData['license_type'],
            'license_expiry_date' => $validateData['license_expiry_date'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(DriverApp::findOrFail($id)->load('transport_routes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
