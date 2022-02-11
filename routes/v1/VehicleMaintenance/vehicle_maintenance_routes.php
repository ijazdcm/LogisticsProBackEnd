<?php

use App\Http\Controllers\VehicleMaintenance\VehicleMaintenanceMasterController;
use App\Http\Controllers\Vehicles\VehicleCapacityController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes For ALL Vechile Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
        //after the auth  have been implemented move the below routes inside the middle ware
});

/**
 * this resource index method query against parking_yard_gate table on parking status is on Gate IN
 */
Route::apiResource('VehicleMaintenance',VehicleMaintenanceMasterController::class);


