<?php

use App\Http\Controllers\Location\LocationMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Designation Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {

  //after the auth  have been implemented move the below routes inside the middle ware

});

Route::apiResource('location', LocationMasterController::class);
