<?php

use App\Http\Controllers\Drivers\DriverMasterController;
use App\Http\Controllers\Drivers\DriverTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Driver Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
    Route::get('driverType',DriverTypeController::class);

    Route::apiResource('drivers',DriverMasterController::class);
});



