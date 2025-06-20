<?php
namespace App\Observers;

use App\Models\Rating;
use App\Models\ProviderStat;

class RatingObserver
{
    public function created(Rating $rating)
    {
        if ($rating->approved) {
            self::recalculate($rating->provider_id);
        }
    }

    public function updated(Rating $rating)
    {
        if ($rating->isDirty('approved') || $rating->isDirty('rating')) {
            self::recalculate($rating->provider_id);
        }
    }

    public function deleted(Rating $rating)
    {
        self::recalculate($rating->provider_id);
    }

    protected static function recalculate($providerId)
    {
        $ratings = \App\Models\Rating::where('provider_id', $providerId)
            ->where('approved', true);

        $avg = round($ratings->avg('rating'), 2);
        $count = $ratings->count();

        ProviderStat::updateOrCreate(
            ['provider_id' => $providerId],
            [
                'average_rating' => $avg,
                'reviews_count' => $count,
            ]
        );
    }
}
