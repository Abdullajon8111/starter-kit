<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Authorization\Http\Controllers\AuthorizationController;

Route::prefix('auth')->group(function () {

    Route::get('login', [AuthorizationController::class, 'index'])->name('authorization.index');
    Route::post('login', [AuthorizationController::class, 'attempt'])->name('authorization.attempt');

});
