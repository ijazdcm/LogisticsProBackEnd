<?php

// use App\Http\Controllers\VehicleMaintenance\VehicleMaintenanceWorkOrderController;
// use App\Models\Vehicles\vehicle_maintenance_type;
// use App\Http\Controllers\Vehicles\VehicleCapacityController;

use App\Http\Controllers\VehicleMaintenance\VehicleMaintenanceWorkOrderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes For ALL Vehicle Maintenance Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
        //after the auth  have been implemented move the below routes inside the middle ware
});

/**
 * this resource index method query against parking_yard_gate table on parking status is on Gate IN
 */
Route::apiResource('maintenance_workorder',VehicleMaintenanceWorkOrderController::class);

// VehicleMaintenanceWorkOrderController
