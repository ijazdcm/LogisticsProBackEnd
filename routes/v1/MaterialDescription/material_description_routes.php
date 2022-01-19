<?php


use App\Http\Controllers\MaterialDescription\MaterialDescriptionMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Material Description Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
  //after the auth  have been implemented move the below routes inside the middle ware
});
Route::apiResource('material_description', MaterialDescriptionMasterController::class);
