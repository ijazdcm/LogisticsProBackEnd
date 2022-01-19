<?php
use App\Http\Controllers\User\UserMasterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL VENDOR Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{

     //after the auth  have been implemented move the below routes inside the middle ware

});


Route::apiResource('users',UserMasterController::class);
