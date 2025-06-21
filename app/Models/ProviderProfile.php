<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderProfile extends Model
{
    protected $fillable = [
        'provider_id',
        'bio',
        'phone',
        'whatsapp',
        'location',
        'city_id',
        'area_id',
        'latitude',
        'longitude',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
