<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMiddleware
{
    public function __construct(protected RateLimiter $limiter) { }

    public function handle($request, Closure $next, $limit = 60, $time = 1)
    {
        $key = $request->ip();

        if ($this->limiter->tooManyAttempts($key, $limit)) {
            return response('Too Many Requests', Response::HTTP_TOO_MANY_REQUESTS);
        }

        $this->limiter->hit($key, $time);

        return $next($request);
    }
}
