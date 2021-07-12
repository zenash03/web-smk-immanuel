<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class TokenValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = User::where('token', $request->token)->first();

        if (!$token) {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        return $next($request);
    }
}
