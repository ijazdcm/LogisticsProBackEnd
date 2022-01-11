<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vehicles\VehicleTypeResource;
use App\Models\Vehicles\Vehicle_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

      return  Cache::remember('vehicle_Types',now()->addDecade(),function()
        {
            return VehicleTypeResource::collection(Vehicle_Type::all());
        });


    }
}
