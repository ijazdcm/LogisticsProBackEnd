<?php

use App\Http\Controllers\Uom\UomMasterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Uom Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    Route::apiResource('uom', UomMasterController::class);
});
