<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected function requireAdmin(): void
    {
        abort_unless(Auth::check() && Auth::user()?->hasRole('admin'), 403);
    }

    protected function authorizeDriverAccess(?Driver $driver = null): void
    {
        $user = Auth::user();

        abort_unless(
            $user !== null && (
                $user->hasRole('admin') || ($driver !== null && $driver->users_id === $user->id)
            ),
            403,
        );
    }
}
