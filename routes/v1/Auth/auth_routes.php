<?php

use App\Http\Controllers\Auth\Admin\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL LOGINS TO APP
|--------------------------------------------------------------------------
*/

Route::post('admin/login',[AuthController::class,'login']);


/*
|--------------------------------------------------------------------------
| START OF API Routes For Forget Password Feature
|--------------------------------------------------------------------------
*/

Route::post('user/forget-password',[AuthController::class,'forgetPassword']);
Route::post('user/verify-otp',[AuthController::class,'verifyOtp']);
Route::post('user/change-new-password',[AuthController::class,'updateNewPassword']);


/*
|--------------------------------------------------------------------------
|END OF API Routes For Forget Password Feature
|--------------------------------------------------------------------------
*/

Route::group(["middleware"=>"auth:sanctum","prefix"=>"admin"],function()
{
    Route::post('logout',[AuthController::class,'logout']);

});



