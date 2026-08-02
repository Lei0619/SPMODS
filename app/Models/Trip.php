<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;

    protected $fillable = [
        'trip_code',
        'vehicle_id',
        'departure_time',
        'arrival_time',
        'status',
    ];

    /** @return BelongsTo<Vehicle, $this> */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /** @return HasMany<PassengerLog, $this> */
    public function passengerLogs(): HasMany
    {
        return $this->hasMany(PassengerLog::class);
    }

    /** @return HasMany<PassengerLog, $this> */
    public function passengers(): HasMany
    {
        return $this->passengerLogs();
    }

    /** @return HasMany<Violation, $this> */
    public function violations(): HasMany
    {
        return $this->hasMany(Violation::class);
    }
}
