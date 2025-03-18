<?php

use App\Http\Controllers\Controller;
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
    Route::view('queues', 'queues')->name('admin_queues');

    Route::post('/save/video', [Controller::class, 'saveVideo'])->name('save_video');
});

Route::middleware(['auth', 'role:counter'])->group(function () {
    Route::view('/counter/dashboard', 'counter_ui')->name('counter_dashboard');
});

Route::middleware(['auth', 'role:queuer'])->group(function () {
    Route::view('/queuer', 'queuer')->name('queuer_dashboard');
});

Route::get('/test', function() {
    return view('test');
});

require __DIR__ . '/auth.php';