<?php


use App\Http\Controllers\PreviousLoadDetails\PreviousLoadDetailsMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Previous Load Details Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    // Route::apiResource('previous_load_details', PreviousLoadDetailsMasterController::class);
});

Route::apiResource('previous_load_details', PreviousLoadDetailsMasterController::class);
