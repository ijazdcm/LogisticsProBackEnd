<?php

use App\Http\Controllers\Drivers\DriverMasterController;
use App\Http\Controllers\Drivers\DriversActiveController;
use App\Http\Controllers\Drivers\DriverTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Driver Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
   //after the auth  have been implemented move the below routes inside the middle ware
});


Route::get('driverType',DriverTypeController::class);
Route::get('activeDrivers',DriversActiveController::class);

Route::apiResource('drivers',DriverMasterController::class);
