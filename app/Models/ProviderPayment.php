<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderPayment extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderPaymentFactory> */
    use SoftDeletes, HasFactory;

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
