<?php

namespace Probytech\Promin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use Probytech\Promin\Providers\ProminServiceProvider;

class Authenticate
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
        if (!Gate::check('viewPromin')) {
			return redirect(ProminServiceProvider::LOGIN);
        }

		return $next($request);
	}
}