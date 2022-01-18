<?php


use App\Http\Controllers\MaterialDescription\MaterialDescriptionMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Material Description Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    Route::apiResource('material_description', MaterialDescriptionMasterController::class);
});
