<?php

namespace Illuminate\Foundation\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateCsrfToken
{
    public function handle(Request $request, Closure $next)
    {
        // Skip CSRF for GET, HEAD, OPTIONS
        if (
            $request->isMethod('GET') ||
            $request->isMethod('HEAD') ||
            $request->isMethod('OPTIONS')
        ) {
            return $next($request);
        }

        $requestToken = $request->input('_token');

        $sessionToken = $request->session()->token();

        if ($requestToken !== $sessionToken) {
            abort(419, 'Page Expired');
        }

        return $next($request);
    }
}