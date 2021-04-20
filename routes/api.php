<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Login Api
Route::post('login', [LoginController::class, 'login']);

// product api
Route::get('products', [ProductApiController::class, 'index']);
