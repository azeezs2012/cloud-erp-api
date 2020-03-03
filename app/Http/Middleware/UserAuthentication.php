<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if(!is_null($user)){
            return $next($request);
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
