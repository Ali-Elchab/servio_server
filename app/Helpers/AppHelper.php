<?php


namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class AppHelper
{

    public static function generateServioKey()
    {
        return Str::random(64);
    }
}
