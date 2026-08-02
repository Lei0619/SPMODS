<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Http\Requests\StoreViolationRequest;
use App\Http\Requests\UpdateViolationRequest;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return Violation::with([
            'driver',
            'vehicle',
            'trip',
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
    public function store(StoreViolationRequest $request): mixed
    {
        $violation = Violation::create($request->validated());

        return response()->json(['message' => 'Violation created successfully', 'violation' => $violation], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Violation $violation): mixed
    {
        return response()->json($violation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Violation $violation): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateViolationRequest $request, Violation $violation): mixed
    {
        $violation->update($request->validated());

        return response()->json(['message' => 'Violation updated successfully', 'violation' => $violation]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Violation $violation): mixed
    {
        $violation->delete();

        return response()->json(['message' => 'Violation deleted successfully']);
    }
}
