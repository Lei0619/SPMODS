<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'licence_number',
        'license_type',
        'license_expiry_date',
    ];

    /**
     * Get the transport route that owns the driver app.
     *
     * @return BelongsTo<TransportRoute, $this>
     */
    public function transport_routes(): BelongsTo
    {
        return $this->belongsTo(TransportRoute::class, 'transport_route_id');
    }
}
