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

Route::view('/', 'welcome');

Route::middleware(['auth', "verified"])->group(function () {
    Route::view('two-factor-auth', 'auth.two-factor-auth')->name('two-factor-auth');
    Route::view('profile/update', 'auth.profile-update')->name('profile.update');;
    Route::view('password/update', 'auth.password-update')->name('passwords.update');
    Route::view('test', 'test')->name('test');
    Route::view('home', 'home')->name('home');
});
