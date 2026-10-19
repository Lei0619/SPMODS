<?php

namespace App\Models;

use Database\Factories\DriverAppFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverApp extends Model
{
    /** @use HasFactory<DriverAppFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'license_number',
        'license_type',
        'license_expiry_date',
    ];
}
