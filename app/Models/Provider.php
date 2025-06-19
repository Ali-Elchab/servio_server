<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'bio_en',
        'bio_ar',
        'phone',
        'whatsapp',
        'location_en',
        'location_ar',
        'latitude',
        'longitude',
        'subcategory_id',
        'user_id',
        'profile_image',
        'work_images',
        'portfolio_file',
        'is_active',
    ];

    protected $casts = [
        'work_images' => 'array',
        'is_active' => 'boolean',
    ];
    
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
