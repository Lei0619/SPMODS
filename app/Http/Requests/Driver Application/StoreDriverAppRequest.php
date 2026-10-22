<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDriverAppRequest extends FormRequest
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
        $driverApp = $this->route('driver_app');

        return [
            'full_name' => 'required|string|max:255',
            'phone_number' => ['required', 'string', 'max:20',
                Rule::unique('driver_apps', 'phone_number')->ignore($driverApp)],
            'license_number' => ['required', 'string', 'max:255',
                Rule::unique('driver_apps', 'license_number')->ignore($driverApp)],
            'license_type' => 'required|string|max:255',
            'license_expiry_date' => 'required|date',
        ];
    }
}
