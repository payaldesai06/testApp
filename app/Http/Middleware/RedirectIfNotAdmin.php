<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'web') {

		if (Auth::guard($guard)->check()) {
			if(Auth::user()->role_id == 2){
                return redirect('login')->with('error','You have no access to login.');
            }
		}

		return $next($request);
	}
}
