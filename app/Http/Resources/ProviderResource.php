<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'bio'             => $this->bio,
            'phone'           => $this->phone,
            'whatsapp'        => $this->whatsapp,
            'location'        => $this->location,
            'latitude'        => $this->latitude,
            'longitude'       => $this->longitude,

            'subcategory'     => [
                'id'    => $this->subcategory->id,
                'name'  => $locale === 'ar' ? $this->subcategory->name_ar : $this->subcategory->name_en,
            ],

            'profile_image'   => $this->profile_image ? asset('storage/' . $this->profile_image) : null,
            'work_images'     => $this->work_images ? collect($this->work_images)->map(fn($img) => asset('storage/' . $img)) : [],
            'portfolio_file'  => $this->portfolio_file ? asset('storage/' . $this->portfolio_file) : null,

            'is_active'       => (bool) $this->is_active,
            'approval_status' => $this->approval_status,
        ];
    }
}
