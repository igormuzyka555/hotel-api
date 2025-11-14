<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $envKey = env('API_KEY');

        // 1) Authorization: Bearer KEY
        $header = $request->header('Authorization');
        $fromHeader = null;

        if ($header && str_starts_with($header, 'Bearer ')) {
            $fromHeader = substr($header, 7);
        }

        // 2) ?api_key=KEY
        $fromQuery = $request->query('api_key');

        $key = $fromHeader ?? $fromQuery;

        if (!$key || $key !== $envKey) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }
}