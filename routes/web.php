<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\DashboardController;

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

// Routes for all users.
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Prevent banned user from using website.
Route::group(['middleware' => ['auth:sanctum', 'user.allowed']], function () {
    // Routes for admins.
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/users', [UsersController::class, 'get']);
        Route::get('/users/{id}', [UserController::class, 'get'])->name('users.search');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    });

    // Routes for authenticated users.
    Route::get('/dashboard', [DashboardController::class, 'get'])->name('dashboard');
});