<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDriverRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',

            'license_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('drivers', 'license_number')->ignore($this->driver),
            ],

            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:active,inactive',
        ];
    }
}
