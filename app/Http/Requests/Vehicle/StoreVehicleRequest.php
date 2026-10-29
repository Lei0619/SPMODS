<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('admin') ?? false;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'plate_number' => ['nullable', 'string', 'max:255', 'unique:vehicles,plate_number'],
            'vehicle_type' => ['sometimes', 'string', 'max:255', 'in:jeepney'],
            'max_capacity' => ['nullable', 'integer', 'min:1'],
            'driver_id' => ['nullable', 'exists:drivers,id'],
            'route_id' => ['nullable', 'exists:transport_routes,id'],
            'status' => ['nullable', 'in:available,on_trip,maintenance,offline'],
        ];
    }
}
