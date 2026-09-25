<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverAppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|required|string|max:20|unique:driver_apps,phone_number',
            'license_number' => 'sometimes|required|string|max:255|unique:driver_apps,license_number',
            'license_type' => 'sometimes|required|string|max:255',
            'license_expiry_date' => 'sometimes|required|date',
        ];
    }
}
