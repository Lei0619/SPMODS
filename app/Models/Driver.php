<?php

namespace App\Models;

use Database\Factories\DriverFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    /** @use HasFactory<DriverFactory> */
    use HasFactory;

    protected $fillable = [
        'users_id',
        'first_name',
        'last_name',
        'license_number',
        'phone_number',
        'status',
    ];

    /** @return HasOne<Vehicle, $this> */
    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class, 'driver_id', 'id');
    }

    /** @return HasMany<Violation, $this> */
    public function violations(): HasMany
    {
        return $this->hasMany(Violation::class);
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
