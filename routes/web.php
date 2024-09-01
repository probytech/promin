<?php

use Illuminate\Support\Facades\Route;
use Probytech\Promin\Http\Controllers\Auth\LoginController;
use Probytech\Promin\Http\Controllers\Pages\Builder\CollectionController;
use Probytech\Promin\Http\Controllers\Pages\DashboardController;
use Probytech\Promin\Http\Controllers\Pages\IndexController;

Route::middleware('promin')
	->as('promin.')
	->prefix('promin')
	->group(function () {

		Route::middleware('promin.guest')->group(function () {

			Route::get('login', [LoginController::class, 'show'])->name('login.show');
			Route::post('login', [LoginController::class, 'store'])->name('login.store');
		});

		Route::middleware('promin.admin')->group(function () {

			Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

			Route::get('builder/collections', [CollectionController::class, 'index'])->name('builder.collections');
			Route::get('builder/collections/create', [CollectionController::class, 'create'])->name('builder.collections.create');
			Route::get('builder/collections/{collection:table_name}', [CollectionController::class, 'show'])->name('builder.collections.show');

			Route::get('collections/{collection:table_name}', [IndexController::class, 'index'])->name('collections.index');
			Route::get('collections/{collection:table_name}/edit/{id}', [IndexController::class, 'show'])->name('collections.show');

			Route::post('logout', [LoginController::class, 'destroy'])->name('logout.store');
		});
	});
