<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class hasStudentAccount {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		$user = Auth::user();
		if (Auth::guard($guard)->check() && $user->userType == 'student') {
			if (!$user->student) {
				return redirect(RouteServiceProvider::HOME);
			}
		}

		return $next($request);
	}
}
