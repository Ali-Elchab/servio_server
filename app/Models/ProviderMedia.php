<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderMedia extends Model
{
    use SoftDeletes, HasFactory;
    
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
