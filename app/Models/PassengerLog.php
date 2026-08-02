<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PassengerLog extends Model
{
    public $table = 'passenger_logs';

    protected $fillable = [
        'trip_id',
        'vehicle_id',
        'passenger_count',
        'available_seats',
        'is_full',
        'status',
    ];

    /** @return BelongsTo<Trip, $this> */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /** @return BelongsTo<Vehicle, $this> */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /** @return BelongsTo<Trip, $this> */
    public function passengerlog(): BelongsTo
    {
        return $this->trip();
    }
}
