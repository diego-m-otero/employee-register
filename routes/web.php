<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Roles
 */
Route::get('/admin/roles/datatable', [App\Http\Controllers\RoleController::class, 'datatable']);
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::post('/admin/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/admin/roles/edit/{role}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::post('/admin/roles/update/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::post('/admin/roles/destroy/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

/**
 * Area
 */
Route::get('/areas', [App\Http\Controllers\AreaController::class, 'index'])->name('areas.index');
