<?php

use App\Http\Controllers\DieselVendor\DieselVendorMasterController;
use App\Http\Controllers\User\UserMasterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL VENDOR Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{

    Route::apiResource('users',UserMasterController::class);

    Route::apiResource('dieselvendor',DieselVendorMasterController::class);

});



