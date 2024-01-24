<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ProductController;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "api" middleware group. Make something great!
  |
 */

Route::group(['middleware' => ['json.response']], function () {
    Route::post('/auth/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/auth/register', [ApiAuthController::class, 'register'])->name('register.api');
    Route::post('/auth/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
});

Route::resource('products', ProductController::class)->middleware(['auth:api']);
