<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Manager\AuthController;


Route::group(['prefix' => 'auth'], function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/signin', [AuthController::class, 'signin']);

    Route::middleware('auth:users')->post('/logout',[AuthController::class, 'logout']);

});
