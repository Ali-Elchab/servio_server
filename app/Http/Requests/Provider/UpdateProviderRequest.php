<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'category_id'   => 'sometimes|exists:categories,id',
            'business_name' => 'sometimes|string|max:255',

            // Profile
            'bio'       => 'nullable|string',
            'phone'     => 'sometimes|string|max:20',
            'whatsapp'  => 'nullable|string|max:20',
            'city'      => 'sometimes|string|max:100',
            'area'      => 'sometimes|string|max:100',
            'location'  => 'nullable|string|max:255',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

            // Media
            'profile_image'  => 'nullable|image',
            'work_images'    => 'nullable|array',
            'work_images.*'  => 'image',
            'portfolio_file' => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }
}
