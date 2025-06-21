<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderStat extends Model
{

    use SoftDeletes, HasFactory;
    
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
