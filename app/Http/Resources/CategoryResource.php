<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            'id'         => $this->id,
            'name'       => $locale === 'ar' ? $this->name_ar : $this->name_en,
            'slug'       => $this->slug,
            'image_url'  => $this->image ? asset('storage/' . $this->image) : null,
            'priority'   => $this->priority,
            'is_active'  => (bool) $this->is_active,
        ];
    }
}
