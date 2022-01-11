<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vehicles\VehicleBodyResource;
use App\Models\Vehicles\Vehicle_Body_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleBodyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return  Cache::remember('vehicle_Body',now()->addDecade(),function()
        {
            return VehicleBodyResource::collection(Vehicle_Body_Type::all());
        });
    }
}
