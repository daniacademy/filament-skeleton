<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateHealthWithBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $username = config('services.health.username');
        $password = config('services.health.password');

        if (
            $request->headers->get('PHP_AUTH_USER') !== $username
            || $request->headers->get('PHP_AUTH_PW') !== $password
        ) {
            return response(
                'Invalid credentials.',
                401,
                ['WWW-Authenticate' => 'Basic']
            );
        }

        return $next($request);
    }
}
