<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $this->requireAdmin();

        return Notification::with([
            'vehicle',
            'driver',
            'trip',
            'violation',
        ])->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification): mixed
    {
        $this->requireAdmin();

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
}
