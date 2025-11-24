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

            'category'     => $this->category ? [
                'id'        => $this->category->id,
                'parent_id' => $this->category->parent_id,
                'name'      => $locale === 'ar' ? $this->category->name_ar : $this->category->name_en,
            ] : null,

            'profile_image'   => $this->media?->profile_image ? asset('storage/' . $this->media->profile_image) : null,
            'work_images'     => $this->media?->work_images
                ? collect(is_array($this->media->work_images) ? $this->media->work_images : json_decode($this->media->work_images, true) ?? [])
                    ->map(fn($img) => asset('storage/' . $img))
                    ->values()
                    ->all()
                : [],
            'portfolio_file'  => $this->media?->portfolio_file ? asset('storage/' . $this->media->portfolio_file) : null,

            'is_active'       => (bool) $this->is_active,
            'approval_status' => $this->approval_status,
        ];
    }
}
