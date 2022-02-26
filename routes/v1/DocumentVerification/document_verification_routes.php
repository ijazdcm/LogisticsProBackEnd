<?php

use App\Http\Controllers\DocumentVerification\DocumentVerificationMasterController;
use App\Http\Controllers\Sap\DocumentVerification\SapDocumentVerificationController;
use App\Http\Controllers\Vehicles\VehicleCapacityController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes For ALL Vechile Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    //after the auth  have been implemented move the below routes inside the middle ware
});

/**
 * this resource index method query against Document Verification table
 */
Route::apiResource('DocumentVerification', DocumentVerificationMasterController::class);
// Route::get('sap/check-document-available/{$pan_card_no}', SapDocumentVerificationController::class);
Route::get('sap/check-document-available/{pan_card_no}', SapDocumentVerificationController::class);
