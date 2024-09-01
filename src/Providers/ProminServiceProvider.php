<?php

namespace Probytech\Promin\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Probytech\Promin\Console\InstallCommand;
use Probytech\Promin\Http\Middleware\Authenticate;
use Probytech\Promin\Http\Middleware\HandleInertiaRequests;
use Probytech\Promin\Http\Middleware\RedirectIfAuthenticated;
use Probytech\Promin\Models\Role;
use Probytech\Promin\Services\CustomLengthAwarePaginator;

class ProminServiceProvider extends ServiceProvider
{
	/**
	 * The path to Promin "home" route.
	 *
	 * Typically, users are redirected here after authentication.
	 *
	 * @var string
	 */
	public const HOME = '/promin';

	/**
	 * The path to Promin "login" route.
	 *
	 * Typically, users are redirected here after failed authentication.
	 *
	 * @var string
	 */
	public const LOGIN = '/promin/login';

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
		$this->loadViewsFrom(__DIR__ . '/../../resources/views', 'promin');
		$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
		$this->registerCommands();

		$this->gate();
		$this->middlewares();

		$this->app->bind(LengthAwarePaginator::class, CustomLengthAwarePaginator::class);
	}

	/**
	 * Register the Promin Artisan commands.
	 *
	 * @return void
	 */
	protected function registerCommands()
	{
		if ($this->app->runningInConsole()) {
			$this->commands([
				InstallCommand::class,
			]);
		}
	}

	/**
	 * Register the Promin gate.
	 *
	 * This gate determines who can access Promin in non-local environments.
	 *
	 * @return void
	 */
	protected function gate()
	{
		Gate::define('viewPromin', function ($user) {
			return in_array($user->role_id, [
				Role::SUPERADMIN,
				Role::ADMIN,
			]);
		});
	}

	protected function middlewares()
	{
		Route::middlewareGroup('promin', [
			'web',
			HandleInertiaRequests::class,
		]);

		Route::middlewareGroup('promin.guest', [
			RedirectIfAuthenticated::class,
		]);

		Route::middlewareGroup('promin.admin', [
			Authenticate::class,
		]);
	}
}
