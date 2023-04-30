<?php

use Modules\Auth\Http\Controllers\DashboardController;
use Modules\Auth\Http\Controllers\LoginController;

Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt');
});

Route::middleware('auth:web')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
