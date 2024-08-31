<?php

use Illuminate\Support\Facades\Route;
use Probytech\Promin\Http\Controllers\Auth\LoginController;
use Probytech\Promin\Http\Controllers\Pages\DashboardController;

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

        Route::post('logout', [LoginController::class, 'destroy'])->name('logout.store');
    });
});
