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

use Modules\Admin\Http\Controllers\MenuController;

Route::prefix('admin')->group(function () {

    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');

});
