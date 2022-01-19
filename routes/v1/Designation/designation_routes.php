<?php

use App\Http\Controllers\Designation\DesignationMasterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Designation Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {

  //after the auth  have been implemented move the below routes inside the middle ware

});

Route::apiResource('designation', DesignationMasterController::class);
