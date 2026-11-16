<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $driver_app_id
 */
class ApplicationsDocument extends Model
{
    protected $table = 'application_documents';

    protected $fillable = [
        'driver_app_id',
        'google_form_response_id',
        'license_front_image_path',
        'license_back_image_path',
        'supporting_document_path',
        'privacy_consent',
    ];

    /** @return BelongsTo<DriverApp, $this> */
    public function driverApp(): BelongsTo
    {
        return $this->belongsTo(DriverApp::class, 'driver_app_id', 'id');
    }
}
