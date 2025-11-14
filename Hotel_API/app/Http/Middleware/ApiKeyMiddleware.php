<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


// API для Авторизации по типу "Bearer API_KEY" n8n
// и по адрессу ?api_key=API_KEY
class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        //Ключ API в .env в корне
        $envKey = env('API_KEY');

        // 1) Авторизация: Bearer KEY
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