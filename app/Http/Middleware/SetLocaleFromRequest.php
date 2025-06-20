<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->header('Accept-Language') ?? $request->query('lang') ?? 'en';

        if (!in_array($lang, ['en', 'ar'])) {
            $lang = 'en';
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
