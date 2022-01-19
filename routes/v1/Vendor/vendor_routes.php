<?php

use App\Http\Controllers\DieselVendor\DieselVendorMasterController;
use App\Http\Controllers\Vendor\VendorMasterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL VENDOR Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{

 //after the auth  have been implemented move the below routes inside the middle ware

});

Route::apiResource('vendor',VendorMasterController::class);

Route::apiResource('dieselvendor',DieselVendorMasterController::class);

