<?php

namespace App\Http\Requests;

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'plate_number' => ['sometimes', 'string', 'max:255', 'unique:vehicles,plate_number'],
            'vehicle_type' => ['sometimes', 'string', 'max:255'],
            'max_capacity' => ['sometimes', 'integer', 'min:1'],
            'driver_id' => ['sometimes', 'exists:drivers,id'],
            'route_id' => ['sometimes', 'exists:transport_routes,id'],
            'status' => ['sometimes', 'in:available,on_trip,maintenance,offline'],
        ];
    }
}
