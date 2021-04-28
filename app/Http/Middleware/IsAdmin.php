<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(is_null(Auth::user()) || $request->user()->role !== 4 ){  //check is user admin(default 4 for this role)

            return redirect(url('d822638c-a4e7-11eb-afe6-0242ac190003-invest-login'));
        }else{
            return $next($request);
        }
    }
}
