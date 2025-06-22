<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // or implement user checks later
    }

    public function rules(): array
    {
        return [
            'user_id'        => 'required|exists:users,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name'        => 'required|string|max:255',
            'bio'         => 'nullable|string',
            'phone'          => 'required|string|max:20',
            'whatsapp'       => 'nullable|string|max:20',
            'city'           => 'required|string|max:100',
            'area'           => 'required|string|max:100',
            'location'    => 'nullable|string|max:255',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
            'profile_image'  => 'nullable|image',
            'work_images'    => 'nullable|array',
            'work_images.*'  => 'image',
            'portfolio_file' => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'user_id.required'        => 'The user ID is required.',
            'subcategory_id.required' => 'The subcategory ID is required.',
            'name.required'        => 'Name is required.',
            'phone.required'          => 'The phone number is required.',
            'city.required'           => 'The city is required.',
            'area.required'           => 'The area is required.',
            // Add more custom messages as needed
        ];
    }
}
