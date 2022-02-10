<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Manager\EventController;


Route::group(['prefix' => 'events'], function () {
    Route::get('/', [EventController::class , 'index']);
    Route::post('/', [EventController::class , 'store']);
    Route::delete('/{id}',[EventController::class,'destroy']);
});
