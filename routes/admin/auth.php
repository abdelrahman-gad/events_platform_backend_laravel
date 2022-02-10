<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Admin\AuthController;


Route::group(['prefix' => 'auth'], function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::middleware('auth:admins')->post('/logout',[AuthController::class, 'logout']);

});
