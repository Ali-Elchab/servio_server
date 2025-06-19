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


    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }
}
