<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'base');

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::view('counter', 'counter')->name('counter');
});

Route::middleware(['auth', 'role:counter'])->group(function () {
    Route::view('/counter/dashboard', 'counter_ui')->name('counter_dashboard');
});

require __DIR__ . '/auth.php';