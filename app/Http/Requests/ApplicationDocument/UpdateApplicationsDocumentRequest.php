<?php

namespace App\Http\Requests\ApplicationDocument;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationsDocumentRequest extends FormRequest
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
            'driver_app_id' => 'required|exists:driver_apps,id',
            'license_front_image_path' => 'required|string|max:255',
            'license_back_image_path' => 'required|string|max:255',
            'supporting_document_path' => 'nullable|string|max:255',
        ];
    }
}
