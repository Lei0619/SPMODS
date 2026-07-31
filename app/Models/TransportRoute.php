<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_name',
        'origin',
        'destination',
        'distance',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'route_id');
    }
}
