<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateViolationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'driver_id' => ['sometimes', 'exists:drivers,id'],
            'vehicle_id' => ['sometimes', 'exists:vehicles,id'],
            'trip_id' => ['sometimes', 'exists:trips,id'],

            'allowed_capacity' => ['sometimes', 'integer', 'min:1'],
            'actual_capacity' => ['sometimes', 'integer', 'min:1'],

            'violation_type' => [
                'sometimes',
                Rule::in([
                    'overLoad',
                    'sensorFailure',
                    'unauthorizedStopping',
                ]),
            ],

            'violation_time' => ['sometimes', 'date'],
        ];
    }
}
