<?php

namespace App\Http\Requests\Log;

use Illuminate\Foundation\Http\FormRequest;

class StorePassengerLogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'trip_id' => 'required|exists:trips,id',

            'vehicle_id' => 'required|exists:vehicles,id',

            'passenger_count' => 'required|integer|min:0',

            'available_seats' => 'required|integer|min:0',

            'is_full' => 'required|boolean',

            'status' => 'required|in:Available,Full,Overloaded',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'trip_id.required' => 'Trip ID is required.',
            'trip_id.exists' => 'The selected trip does not exist.',

            'vehicle_id.required' => 'Vehicle ID is required.',
            'vehicle_id.exists' => 'The selected vehicle does not exist.',

            'passenger_count.required' => 'Passenger count is required.',
            'passenger_count.integer' => 'Passenger count must be a whole number.',
            'passenger_count.min' => 'Passenger count cannot be negative.',

            'available_seats.required' => 'Available seats are required.',
            'available_seats.integer' => 'Available seats must be a whole number.',
            'available_seats.min' => 'Available seats cannot be negative.',

            'is_full.required' => 'Please specify if the vehicle is full.',
            'is_full.boolean' => 'The is_full field must be true or false.',

            'status.required' => 'Status is required.',
            'status.in' => 'Status must be Available, Full, or Overloaded.',
        ];
    }
}
