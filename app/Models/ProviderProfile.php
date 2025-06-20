<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderProfile extends Model
{
    protected $fillable = [
        'provider_id',
        'bio_en',
        'bio_ar',
        'phone',
        'whatsapp',
        'location_en',
        'location_ar',
        'latitude',
        'longitude',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
