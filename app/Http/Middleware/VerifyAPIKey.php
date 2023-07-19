<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAPIKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('7N6aHHMG6ALr6QORWNTh5SyXPBYPk8bQ');

        if (!$apiKey) {
            return response()->json(['message' => 'No API key found in request'], 401);
        }

        // Perform additional verification or validation of the API key if needed

        return $next($request);
    }
}
