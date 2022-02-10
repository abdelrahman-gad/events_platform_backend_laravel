<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    require 'auth.php';
    
    require 'events.php';

});

