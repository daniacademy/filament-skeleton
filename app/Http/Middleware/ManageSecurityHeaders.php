<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageSecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set(
            'Strict-Transport-Security',
            'max-age=31536000; includeSubDomains; preload'
        );
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->remove('Date');
        $response->headers->remove('X-Powered-By');

        return $response;
    }
}
