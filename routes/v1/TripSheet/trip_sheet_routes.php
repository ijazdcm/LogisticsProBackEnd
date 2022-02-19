<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripSheet\TripSheetMasterController;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Driver Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
    Route::post('trip-sheet',[TripSheetMasterController::class,'createTripSheet']);
    //after the auth  have been implemented move the below routes inside the middle ware
});



Route::get('trip-sheet/ready-to-trip',[TripSheetMasterController::class,'vehicleReadyToTrip']);
Route::get('trip-sheet/ready-to-trip/vehicle-info/{id}',[TripSheetMasterController::class,'singleVehicleInfoOnGate']);

