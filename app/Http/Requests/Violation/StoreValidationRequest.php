<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreViolationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'driver_id' => ['required', 'exists:drivers,id'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'trip_id' => ['required', 'exists:trips,id'],

            'allowed_capacity' => ['required', 'integer', 'min:1'],
            'actual_capacity' => ['required', 'integer', 'min:1'],

            'violation_type' => [
                'required',
                Rule::in([
                    'overLoad',
                    'sensorFailure',
                    'unauthorizedStopping',
                ]),
            ],

            'violation_time' => ['nullable', 'date'],
        ];
    }
}