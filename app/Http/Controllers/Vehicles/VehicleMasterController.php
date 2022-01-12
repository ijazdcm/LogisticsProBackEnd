<?php

namespace App\Http\Controllers\Vehicles;

use App\Action\Vehicles\UpdateVehicleImageAction;
use App\Helper\File\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\VehicleInfoRequest;
use App\Http\Requests\Vehicles\VehicleInfoUpdateRequest;
use App\Http\Resources\Vehicles\VehicleInfoResource;
use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleInfoResource::collection(Cache::remember('vehicle_info', now()->addDay(), function () {

            return Vehicle_Info::with('Vehicle_Type')
              ->with('Vehicle_Capacity')
              ->with('Vehicle_Body_Type')
              ->where('vehicle_status',1)->get();

        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleInfoRequest $request,FileHelper $helper)
    {


        //section get the files from $request

        $rc_copy_front=$request->rc_copy_front;
        $rc_copy_back=$request->rc_copy_back;
        $insurance_copy_front=$request->insurance_copy_front;
        $insurance_copy_back=$request->insurance_copy_back;

        //adding the new Vehicle
        $new_vehicle=Vehicle_Info::create([
                "vehicle_type_id"=>$request->vehicle_type_id,
                "vehicle_number"=>$request->vehicle_number,
                "vehicle_capacity_id"=>$request->vehicle_capacity_id,
                "vehicle_body_type_id"=>$request->vehicle_body_type_id,
                "rc_copy_front"=>$helper->storeImage($rc_copy_front,Vehicle_Info::RC_FRONT_PATH),
                "rc_copy_back"=>$helper->storeImage($rc_copy_back,Vehicle_Info::RC_BACK_PATH),
                "insurance_copy_front"=>$helper->storeImage($insurance_copy_front,Vehicle_Info::INSURANCE_FRONT_PATH),
                "insurance_copy_back"=>$helper->storeImage($insurance_copy_back,Vehicle_Info::INSURANCE_BACK_PATH),
                "insurance_validity"=>$request->insurance_validity,
                "fc_validity"=>$request->fc_validity,
                "created_by"=>1,
            ]);

        return  new VehicleInfoResource($new_vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vehicle=Vehicle_Info::where('vehicle_status',1)
                                ->where('id',$id)
                                ->first();

        if($vehicle)
        {
            return new VehicleInfoResource($vehicle);
        }
        return response()->json(['message' => 'Vehicle Not found'], 404);




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleInfoUpdateRequest $request,$id,UpdateVehicleImageAction $action)
    {


          $vehicle=Vehicle_Info::where('vehicle_status',1)
          ->where('id',$id)
          ->first();
          if($vehicle)
          {


            $vehicle=$action->handleUpdateImages($request,$vehicle);

             $is_updated=$vehicle->update([
                 "vehicle_type_id"=>$request->vehicle_type_id,
                "vehicle_number"=>$request->vehicle_number,
                "vehicle_capacity_id"=>$request->vehicle_capacity_id,
                "vehicle_body_type_id"=>$request->vehicle_body_type_id,
                "insurance_validity"=>$request->insurance_validity,
                "fc_validity"=>$request->fc_validity
             ]);

             if($is_updated)
             {
                $updated_vehicle=Vehicle_Info::where('vehicle_status',1)
                ->where('id',$id)
                ->first();
                 return new VehicleInfoResource($updated_vehicle);
             }



          }
          return response()->json(['message' => 'Something went wrong'],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $vehicle=Vehicle_Info::where('vehicle_status',1)
        ->where('id',$id)
        ->first();
        if($vehicle)
        {
            $vehicle->update([$vehicle->vehicle_status=0]);
            return response('',204)->header('Content-Type', 'application/json');
        }

        return response()->json(['message' => 'Vehicle Not found'], 404);

    }
}
