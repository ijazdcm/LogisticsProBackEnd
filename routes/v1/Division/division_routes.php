<?php

use App\Http\Controllers\Division\DivisionMasterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Division Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
  //after the auth  have been implemented move the below routes inside the middle ware
});

Route::apiResource('division', DivisionMasterController::class);
