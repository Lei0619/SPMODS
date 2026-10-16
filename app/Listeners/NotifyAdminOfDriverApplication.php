<?php

namespace App\Listeners;

use App\Events\DriverApplicationSubmitted;
use App\Models\User;
use App\Notifications\DriverApplicationSubmittedNotification;

class NotifyAdminOfDriverApplication
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DriverApplicationSubmitted $event): void
    {
        $driverApp = $event->driverApp;

        $admin = User::role('admin')->firstOrFail();

        $admin->notify(new DriverApplicationSubmittedNotification($driverApp));
    }
}
