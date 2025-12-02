<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionLocale = session('locale');
        $currentLocale = App::getLocale();
        
        Log::debug('SetLocale middleware executing', [
            'session_locale' => $sessionLocale,
            'current_locale_before' => $currentLocale,
            'has_session_locale' => session()->has('locale')
        ]);
        
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
            Log::debug('Locale set from session', [
                'new_locale' => App::getLocale(),
                'session_locale' => session('locale')
            ]);
        }

        return $next($request);
    }
}