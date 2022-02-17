<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Driver Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{
    //after the auth  have been implemented move the below routes inside the middle ware
});

Route::apiResource('customer',CustomerController::class);

