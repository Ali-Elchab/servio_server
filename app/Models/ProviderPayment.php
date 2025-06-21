<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderPayment extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderPaymentFactory> */
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
