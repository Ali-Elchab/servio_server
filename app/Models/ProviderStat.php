<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderStat extends Model
{
    protected $fillable = [
        'provider_id',
        'views',
        'bookings_count',
        'reviews_count',
        'average_rating',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
