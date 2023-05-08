<?php

use Modules\Auth\Http\Controllers\DashboardController;
use Modules\Auth\Http\Controllers\LoginController;
use Modules\Auth\Http\Controllers\PermissionController;
use Modules\Auth\Http\Controllers\RoleController;
use Modules\Auth\Http\Controllers\UserController;

Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt');
});

Route::middleware('auth:web')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('user', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
});



//Route::get('user', [UserController::class, 'index'])->name('user.index');
//Route::get('user/{user}/show', [UserController::class, 'index'])->name('user.index');
//Route::delete('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
