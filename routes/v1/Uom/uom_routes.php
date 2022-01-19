<?php

use App\Http\Controllers\Uom\UomMasterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Uom Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {

      //after the auth  have been implemented move the below routes inside the middle ware

});

Route::apiResource('uom', UomMasterController::class);
