<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PassengerLog;

class PassengerLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PassengerLog::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PassengerLog $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $passengerLog = PassengerLog::create($request->all());
        return response()->json($passengerLog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $passengerLog = PassengerLog::find($id);
        if (!$passengerLog) {
            return response()->json(['message' => 'Passenger log not found'], 404);
        }
        return response()->json($passengerLog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
