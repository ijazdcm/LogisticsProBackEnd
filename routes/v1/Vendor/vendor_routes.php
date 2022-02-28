<?php

use App\Http\Controllers\DieselVendor\DieselVendorMasterController;
use App\Http\Controllers\Sap\VendorCreation\SapVendorCreationController;
use App\Http\Controllers\Vendor\VendorMasterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes For ALL VENDOR Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {

    //after the auth  have been implemented move the below routes inside the middle ware

});

Route::apiResource('vendorCreation', VendorMasterController::class);

Route::get('vendorRequest', [VendorMasterController::class, 'vendor_request_index']);
Route::get('vendorApproval', [VendorMasterController::class, 'vendor_approval_index']);
Route::get('vendorConfirmation', [VendorMasterController::class, 'vendor_confirmation_index']);

Route::apiResource('dieselvendor', DieselVendorMasterController::class);
Route::post('sap/vendor-creation-confirmation',SapVendorCreationController::class);
