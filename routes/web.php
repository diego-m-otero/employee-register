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
Route::get('/admin/areas/datatable', [App\Http\Controllers\AreaController::class, 'datatable']);
Route::get('/admin/areas', [App\Http\Controllers\AreaController::class, 'index'])->name('areas.index');
Route::post('/admin/areas/store', [App\Http\Controllers\AreaController::class, 'store'])->name('areas.store');
Route::get('/admin/areas/edit/{area}', [App\Http\Controllers\AreaController::class, 'edit'])->name('areas.edit');
Route::post('/admin/areas/update/{area}', [App\Http\Controllers\AreaController::class, 'update'])->name('areas.update');
Route::post('/admin/areas/destroy/{area}', [App\Http\Controllers\AreaController::class, 'destroy'])->name('areas.destroy');

/**
 * Employees
 */
Route::get('/admin/employees/datatable', [App\Http\Controllers\EmployeeController::class, 'datatable']);
Route::get('/admin/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
Route::post('/admin/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/admin/employees/edit/{employee}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('/admin/employees/update/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::post('/admin/employees/destroy/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/admin/employees/form-options', [App\Http\Controllers\EmployeeController::class, 'formOptions']);