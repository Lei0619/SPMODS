<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();

        return array_merge(parent::share($request), [
            'name' => config('app.name'),

            'auth' => [
                'user' => $user,
            ],

            'sidebarOpen' => ! $request->hasCookie('sidebar_state')
                || $request->cookie('sidebar_state') === 'true',

            'notifications' => $user && $user->hasRole('admin')
                ? [
                    'unread_count' => $user->unreadNotifications()->count(),
                    'recent' => $user->notifications()
                        ->latest()
                        ->take(5)
                        ->get()
                        ->map(fn ($notification) => [
                            'id' => $notification->id,
                            'data' => $notification->data,
                            'read_at' => $notification->read_at,
                            'created_at' => $notification->created_at,
                        ])
                        ->values(),
                ]
                : [
                    'unread_count' => 0,
                    'recent' => [],
                ],
        ]);
    }
}
