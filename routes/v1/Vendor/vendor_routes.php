<?php
use App\Http\Controllers\Vendor\VendorMasterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL VENDOR Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware"=>"auth:sanctum"],function()
{

    Route::apiResource('vendor',VendorMasterController::class);

});



