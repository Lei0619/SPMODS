<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $table = 'vehicles';
    protected $fillable = [
        'plate_number',
        'vehicle_type',
        'max_capacity',
        'device_id',
        'driver_id',
        'route_id',
        'status',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function transportRoute()
    {
        return $this->belongsTo(TransportRoute::class, 'route_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
