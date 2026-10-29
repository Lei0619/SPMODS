<?php

namespace App\Http\Controllers;

use App\Models\PassengerLog;
use Illuminate\Http\Request;

class PassengerLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $this->requireAdmin();

        return PassengerLog::with([
            'trip',
        ])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): mixed
    {
        $this->requireAdmin();

        $passengerLog = PassengerLog::create($request->all());

        return response()->json($passengerLog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PassengerLog $passengerLog): mixed
    {
        $this->requireAdmin();

        $passengerLog->load([
            'trip',
        ]);

        return response()->json($passengerLog);
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
