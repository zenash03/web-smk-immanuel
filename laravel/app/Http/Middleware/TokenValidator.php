<?php

namespace App\Http\Middleware;

use App\Models\Admin;
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
        if (!$request->token) return response()->json(['message' => 'Unautorized'], 401);

        $user = Admin::where('token', $request->token)->first();

        if (!$user) return response()->json(['message' => 'Unautorized'], 401);

        return $next($request);
    }
}
