<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransportRouteRequest extends FormRequest
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
            'route_name' => 'required|string|max:255|unique:transport_routes,route_name',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'route_name.required' => 'The route name is required.',
            'route_name.unique' => 'This route already exists.',

            'origin.required' => 'The origin is required.',
            'destination.required' => 'The destination is required.',
        ];
    }
}
