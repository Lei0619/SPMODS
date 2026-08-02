<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransportRoute extends Model
{
    /** @use HasFactory<\Database\Factories\TransportRouteFactory> */
    use HasFactory;

    protected $fillable = [
        'route_name',
        'origin',
        'destination',
        'distance',
    ];

    /** @return HasMany<Vehicle, $this> */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'route_id');
    }
}
