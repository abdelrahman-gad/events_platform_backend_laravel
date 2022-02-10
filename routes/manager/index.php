<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manager'], function () {

    require 'auth.php';

    require 'events.php';

});

