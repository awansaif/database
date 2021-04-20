<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Auth::routes();
});

Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


        // product routes
        Route::resource('product', ProductController::class);

        // user route
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
        Route::resource('user', UserController::class);
    }
);
