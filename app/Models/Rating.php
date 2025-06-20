<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'provider_id',
        'name',
        'rating',
        'comment',
        'approved',
    ];

    public static function booted()
    {
        static::saved(fn($rating) => $rating->updateProviderStats());
        static::deleted(fn($rating) => $rating->updateProviderStats());
    }

    public function updateProviderStats()
    {
        $provider = $this->provider;

        $approvedRatings = $provider->ratings()->approved();

        $provider->stat->update([
            'reviews_count'  => $approvedRatings->count(),
            'average_rating' => round($approvedRatings->avg('rating'), 2),
        ]);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }
}
