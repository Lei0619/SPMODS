<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_code',
        'vehicle_id',
        'departure_time',
        'arrival_time',
        'status',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function passengerLogs()
    {
        return $this->hasMany(PassengerLog::class);
    }

    public function passengers()
    {
        return $this->passengerLogs();
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
