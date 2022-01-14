<?php

use App\Http\Controllers\Shed\ShedInfoController;
use App\Http\Controllers\Shed\ShedTypeController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL SHED Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
    Route::get('shedType',ShedTypeController::class);

    Route::apiResource('shed',ShedInfoController::class);

});



