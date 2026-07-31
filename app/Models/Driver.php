<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'license_number',
        'phone_number',
        'status',
    ];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}