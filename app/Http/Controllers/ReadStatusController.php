<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReadStatusController extends Controller
{
    public function markAsRead(Request $request, string $notificationId): RedirectResponse
    {
        $user = $request->user();
        $notification = $user->notifications()->findOrFail($notificationId);

        $notification->markAsRead();

        return back();
    }
}
