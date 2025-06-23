<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'subcategory_id',
        'user_id',
        'is_active',
        'is_featured',
        'is_verified',
    ];


    protected static function booted()
    {
        static::creating(function ($provider) {
            $provider->media()->create([]);
            $provider->profile()->create([]);
            $provider->stat()->create([]);
        });
        static::deleting(function ($provider) {
            $provider->media()->delete();
            $provider->profile()->delete();
            $provider->stat()->delete();
            $provider->stats()?->delete();
            $provider->payments()?->delete();
        });
    }



    public function profile(): HasOne
    {
        return $this->hasOne(ProviderProfile::class);
    }

    public function media(): HasOne
    {
        return $this->hasOne(ProviderMedia::class);
    }

    public function stats(): HasOne
    {
        return $this->hasOne(ProviderStat::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function payments()
    {
        return $this->hasMany(ProviderPayment::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
