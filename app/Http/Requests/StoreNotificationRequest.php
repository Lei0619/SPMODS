<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNotificationRequest extends FormRequest
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
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'driver_id' => ['required', 'exists:drivers,id'],
            // A notification might not always belong to a trip
            'trip_id' => ['nullable', 'exists:trips,id'],
            // A notification might not always come from a violation
            'violation_id' => ['nullable', 'exists:violations,id'],
            'title' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:500'],
            'type' => [
                'required',
                Rule::in([
                    'overloading',
                    'sensor_failure',
                    'trip_started',
                    'trip_completed',
                    'general',
                ]),
            ],

            'is_read' => ['sometimes', 'boolean'],
        ];
    }
}