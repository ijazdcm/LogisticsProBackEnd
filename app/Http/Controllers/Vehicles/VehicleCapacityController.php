<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\VehicleCapacityRequest;
use App\Http\Resources\Vehicles\VehicleCapacityResource;
use App\Models\Vehicles\Vehicle_Capacity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         return Cache::remember('vehicle_capacity',now()->addDecade(),function(){

            return VehicleCapacityResource::collection(Vehicle_Capacity::all());

         });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleCapacityRequest $request)
    {
         return  VehicleCapacityResource::make(Vehicle_Capacity::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $capacity=Vehicle_Capacity::where('vehicle_status',1)
        ->where('id',$id)
        ->first();

            if($capacity){
                return  VehicleCapacityResource::make($capacity);
            }

        return response()->json(['message' => 'Capacity Not found'], 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleCapacityRequest $request, $id)
    {

           $new_capacity=Vehicle_Capacity::where('vehicle_status',1)
           ->where('id',$id)
           ->first();
           if($new_capacity)
           {
                $new_capacity->update($request->validated());
                return  VehicleCapacityResource::make($new_capacity);
           }

        return response()->json(['message' => 'Capacity Not found'], 404);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $new_capacity=Vehicle_Capacity::where('id',$id)
            ->first();
            if($new_capacity)
            {
                $status=($new_capacity->vehicle_status==0)?1:0;
                $new_capacity->update([$new_capacity->vehicle_status=$status]);
                return response('',204)->header('Content-Type', 'application/json');
            }

            return response()->json(['message' => 'Capacity Not found'], 404);
    }
}
