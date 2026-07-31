<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
