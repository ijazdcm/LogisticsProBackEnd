<?php

use App\Http\Controllers\Status\StatusMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Status Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    Route::apiResource('status', StatusMasterController::class);
});
