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
        /*tenancy()->initialize(tenancy()->getTenant());

        tenancy()->end();*/
        $user = User::where('remember_token',$request->header('UserToken'))->first();
        if(!is_null($user)){
            return $next($request);
        }
        else{
            return false;
        }

    }
}
