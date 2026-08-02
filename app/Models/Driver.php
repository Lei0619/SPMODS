<?php

namespace App\Models;

use Database\Factories\DriverFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    /** @use HasFactory<DriverFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'license_number',
        'phone_number',
        'status',
    ];

    /** @return HasOne<Vehicle, $this> */
    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }

    /** @return HasMany<Vehicle, $this> */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /** @return HasMany<Violation, $this> */
    public function violations(): HasMany
    {
        return $this->hasMany(Violation::class);
    }
}
