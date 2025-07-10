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
            'name'            => $this->user->name,
            'business_name'   => $this->business_name,
            'email'           => $this->user->email,
            'bio'             => $this->profile->bio,
            'phone'           => $this->profile->phone,
            'whatsapp'        => $this->profile->whatsapp,
            'location'        => $this->profile->location,
            'latitude'        => $this->profile->latitude,
            'longitude'       => $this->profile->longitude,

            'subcategory'     => [
                'id'    => $this->subcategory->id,
                'name'  => $locale === 'ar' ? $this->subcategory->name_ar : $this->subcategory->name_en,
            ],

            'profile_image'   => $this->media->profile_image ? asset('storage/' . $this->profile_image) : null,
            'work_images'     => $this->media->work_images ? collect($this->work_images)->map(fn($img) => asset('storage/' . $img)) : [],
            'portfolio_file'  => $this->media->portfolio_file ? asset('storage/' . $this->portfolio_file) : null,

            'is_active'       => (bool) $this->is_active,
            'approval_status' => $this->approval_status,
        ];
    }
}
