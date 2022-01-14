<?php

use App\Http\Controllers\Department\DepartmentMasterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Department Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    Route::apiResource('department', DepartmentMasterController::class);
});
