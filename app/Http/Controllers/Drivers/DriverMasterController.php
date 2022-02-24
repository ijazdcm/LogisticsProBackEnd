<?php

namespace App\Http\Controllers\Drivers;

use App\Action\Driver\UpdateDriverImageAction;
use App\Helper\File\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\DriverInfoPostRequest;
use App\Http\Requests\Driver\DriverInfoPutRequest;
use App\Http\Resources\Drivers\DriverInfoResource;
use App\Models\Driver\Driver_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DriverMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return DriverInfoResource::collection(Cache::remember('drivers', now()->addDay(), function () {

            return Driver_Info::with('driver__types')->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverInfoPostRequest $request, FileHelper $helper)
    {

        // return $request;


        //adding the new Driver
        $new_driver = Driver_Info::create([
            "driver_type_id" => $request->driver_type_id,
            "driver_name" => $request->driver_name,
            "driver_code" => $request->driver_code,
            "driver_phone_1" => $request->driver_phone_1,
            "driver_phone_2" => $request->driver_phone_2,
            "license_no" => $request->license_no,
            "license_validity_to" => $request->license_validity_to,
            "license_validity_status" => $request->license_validity_status,
            "license_copy_front" => $helper->storeImage($request->license_copy_front, Driver_Info::LICENSE_COPY_FRONT_PATH),
            "license_copy_back" => $helper->storeImage($request->license_copy_back, Driver_Info::LICENSE_COPY_BACK_PATH),
            "driver_address" => $request->driver_address,
            "driver_photo" => $helper->storeImage($request->driver_photo, Driver_Info::DRIVER_PHOTO_PATH),
            "aadhar_card" => $helper->storeImage($request->aadhar_card, Driver_Info::AADHAR_PATH),
            "pan_card" => $helper->storeImage($request->pan_card, Driver_Info::PAN_CARD_PATH),
        ]);

        return  new DriverInfoResource($new_driver->load('driver__types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver_Info::where('driver_status', 1)
            ->where('id', $id)
            ->first();

        if ($driver) {
            return new DriverInfoResource($driver->load('driver__types'));
        }
        return response()->json(['message' => 'Driver Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverInfoPutRequest $request, $id, UpdateDriverImageAction $action)
    {
        $driver = Driver_Info::where('driver_status', 1)
            ->where('id', $id)
            ->first();

        if ($driver) {

            $driver = $action->handleUpdateImages($request, $driver);

            $is_updated = $driver->update([
                "driver_type_id" => $request->driver_type_id,
                "driver_name" => $request->driver_name,
                "driver_code" => $request->driver_code,
                "driver_phone_1" => $request->driver_phone_1,
                "driver_phone_2" => $request->driver_phone_2,
                "license_no" => $request->license_no,
                "license_validity_to" => $request->license_validity_to,
                "driver_address" => $request->driver_address,
                "driver_phone_1" => $request->driver_phone_1,
                "license_validity_status" => $request->license_validity_status
            ]);

            if ($is_updated) {
                $updated_driver = Driver_Info::where('id', $id)->first();
                return  DriverInfoResource::make($updated_driver->load('driver__types'));
            }
        }
        return response()->json(['message' => 'Something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver_Info::where('id', $id)->first();

        if ($driver) {
            $status = ($driver->driver_status === 0) ? 1 : 0;
            $driver->update([$driver->driver_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        }

        return response()->json(['message' => 'Driver Not found'], 404);
    }
}
