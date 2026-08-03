<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        return Notification::with([
            'vehicle',
            'driver',
            'trip',
            'violation',
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
    public function store(StoreNotificationRequest $request): mixed
    {
        $notification = Notification::create($request->validated());

        return response()->json([
            'message' => 'Notification created successfully',
            'data' => $notification,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification): mixed
    {
        $notification->load([
            'vehicle',
            'driver',
            'trip',
            'violation',
        ]);

        return response()->json([
            'data' => $notification,
        ]);
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
    public function destroy(Notification $notification): mixed
    {
        $notification->delete();

        return response()->json([
            'message' => 'Notification deleted successfully',
        ]);
    }
}
