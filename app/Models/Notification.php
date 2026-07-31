<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'vehicle_id',
        'type',
        'title',
        'message',
        'is_read',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
