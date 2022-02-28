<?php

use App\Http\Controllers\RJSaleOrder\RJSaleOrderCreationController;
use App\Http\Controllers\Sap\RJourney\SapRjCreationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Rejection Reason Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    // Route::apiResource('rj_saleorder_creation', RJSaleOrderCreationController::class);
});

Route::apiResource('rj_saleorder_creation', RJSaleOrderCreationController::class);

Route::post('sap/rj-sale-order-creation', SapRjCreationController::class);
