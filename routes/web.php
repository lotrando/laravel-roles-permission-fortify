<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\PaintController;
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

Route::view('/', 'home');

Route::middleware(['auth', "verified"])->group(function () {
    Route::view('two-factor-auth', 'auth.two-factor-auth')->name('two-factor-auth');
    Route::view('profile/update', 'auth.profile-update')->name('profile.update');;
    Route::view('password/update', 'auth.password-update')->name('passwords.update');
    Route::view('test', 'test')->name('test');
    Route::view('home', 'home')->name('home');
});

// User Routes
Route::middleware(['auth', "verified"])->prefix('user')->name('user.')->group(function () {
    Route::resource('/paints', PaintController::class);
    Route::resource('/bikes', BikeController::class);
    Route::get('full-calendar', [FullCalendarController::class, 'index']);
    Route::post('full-calendar/action', [FullCalendarController::class, 'action']);
});

// Admin routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/departments', [DepartmentController::class, 'index']);

});
