<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderMedia extends Model
{
    protected $fillable = [
        'provider_id',
        'profile_image',
        'work_images',
        'portfolio_file',
    ];

    protected $casts = [
        'work_images' => 'array',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
