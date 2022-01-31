<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vehicles\VehicleByTypeResource;
use App\Models\Vehicles\Vehicle_Info;



class VehicleByTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {

        return VehicleByTypeResource::collection(Vehicle_Info::where('vehicle_type_id',$id)->where('vehicle_status',1)->get());
    }
}
