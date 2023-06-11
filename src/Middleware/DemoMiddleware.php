<?php

// In src/Middleware/TrackingCookieMiddleware.php
namespace App\Middleware;

use Cake\Log\Log;

class DemoMiddleware
{
    public function __invoke($request, $response, $next)
    {
        Log::error('DemoMiddleware Log.');
        return $next($request, $response);
    }
}
