<?php

use App\Http\Controllers\ParkingYardGate\ParkingYardGateController;
use App\Http\Controllers\ParkingYardGate\ParkingYardGateInActionController;
use App\Http\Controllers\ParkingYardGate\ParkingYardGateOutActionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For ALL Driver Related Routes
|--------------------------------------------------------------------------
*/


Route::group(["middleware" => "auth:sanctum"], function () {
    //after the auth  have been implemented move the below routes inside the middle ware
    Route::apiResource('parkingYard', ParkingYardGateController::class);
});



Route::put('parkingYard/action/gateIn/{id}', ParkingYardGateInActionController::class);
Route::put('parkingYard/action/gateOut/{id}', ParkingYardGateOutActionController::class);

Route::get('parkingYardGate/{id}', [ParkingYardGateController::class, 'view']);
