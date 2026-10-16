<?php

namespace App\Notifications;

use App\Models\DriverApp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DriverApplicationSubmittedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public DriverApp $driverApp)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // note: add the mail channel if you want to send email notifications as well
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A new driver application has been submitted.',
            'driver_app_id' => $this->driverApp->id,
            'full_name' => $this->driverApp->full_name,
        ];
    }
}
