<?php

use App\Http\Controllers\Auth\Admin\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL LOGINS TO APP
|--------------------------------------------------------------------------
*/

Route::post('admin/login',[AuthController::class,'login']);



Route::group(["middleware"=>"auth:sanctum","prefix"=>"admin"],function()
{
    Route::post('logout',[AuthController::class,'logout']);

});



