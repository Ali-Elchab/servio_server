<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderProfile extends Model
{
    use SoftDeletes, HasFactory;
    
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
