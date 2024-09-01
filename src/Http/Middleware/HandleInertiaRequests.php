<?php

namespace Probytech\Promin\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Probytech\Promin\Models\Role;
use Probytech\Promin\Services\MenuService;

class HandleInertiaRequests extends Middleware
{
	/**
	 * The root template that's loaded on the first page visit.
	 *
	 * @see https://inertiajs.com/server-side-setup#root-template
	 *
	 * @var string
	 */
	protected $rootView = 'promin::app';

	/**
	 * Determines the current asset version.
	 *
	 * @see https://inertiajs.com/asset-versioning
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string|null
	 */
	public function version(Request $request)
	{
		return sprintf('%s:%s', $this->rootView, parent::version($request));
	}

	/**
	 * Defines the props that are shared by default.
	 *
	 * @see https://inertiajs.com/shared-data
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function share(Request $request)
	{
		return array_merge(parent::share($request), [
			'app'	=> [
				'name'	=> config('app.name'),
				'menu'	=> (new MenuService())->getMenu(),
			],
			'user'	=> Auth::user(),
			'isSuperAdmin' => Auth::user()?->role_id == Role::SUPERADMIN,
		]);
	}
}
