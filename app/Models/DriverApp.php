<?php

namespace App\Models;

use Database\Factories\DriverAppFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DriverApp extends Model
{
    /** @use HasFactory<DriverAppFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'license_number',
        'license_type',
        'license_expiry_date',
    ];

    /** @return HasMany<ApplicationsDocument, $this> */
    public function applicationsDocuments(): HasMany
    {
        return $this->hasMany(ApplicationsDocument::class);
    }
}
