<?php

use App\Http\Controllers\RejectionReason\RejectionReasonMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Rejection Reason Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    // Route::apiResource('rejection_reason', RejectionReasonMasterController::class);
});

Route::apiResource('rejection_reason', RejectionReasonMasterController::class);
