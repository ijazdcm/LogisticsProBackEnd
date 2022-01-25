<?php

use App\Http\Controllers\DefectType\DefectTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Department Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
     //after the auth  have been implemented move the below routes inside the middle ware
});

Route::apiResource('defectType', DefectTypeController::class);
