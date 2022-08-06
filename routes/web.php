<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('check_time')->name('home');
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('patients', App\Http\Controllers\Admin\PatientController::class);
});
