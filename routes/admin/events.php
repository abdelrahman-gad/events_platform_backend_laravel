<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Admin\EventController;


Route::group(['prefix' => 'rooms', 'middleware' => ['auth:admins']], function () {
    Route::get('/', [RoomController::class , 'index']);
    Route::post('/', [RoomController::class , 'store']);
    Route::put('/{room}', [RoomController::class ,'update']);
    Route::get('/{id}',[RoomController::class ,'show']);
    Route::delete('/{id}',[RoomController::class ,'destroy']);
});
