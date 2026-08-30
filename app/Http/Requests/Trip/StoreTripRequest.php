<?php

namespace App\Http\Requests\Trip;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
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
            'trip_code' => 'required|string|max:255|unique:trips,trip_code',

            'vehicle_id' => 'required|exists:vehicles,id',

            'departure_time' => 'required|date',

            'arrival_time' => 'nullable|date|after_or_equal:departure_time',

            'status' => 'required|in:Active,Completed',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'trip_code.required' => 'Trip code is required.',
            'trip_code.unique' => 'This trip code already exists.',

            'vehicle_id.required' => 'Please select a vehicle.',
            'vehicle_id.exists' => 'The selected vehicle does not exist.',

            'departure_time.required' => 'Departure time is required.',
            'departure_time.date' => 'Departure time must be a valid date and time.',

            'arrival_time.date' => 'Arrival time must be a valid date and time.',
            'arrival_time.after_or_equal' => 'Arrival time cannot be earlier than the departure time.',

            'status.required' => 'Trip status is required.',
            'status.in' => 'Status must be either Active or Completed.',
        ];
    }
}
