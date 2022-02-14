<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\LocationRequest;
use App\Http\Resources\Location\LocationResource;
use App\Models\Location\Location;
use Illuminate\Support\Facades\Cache;

class LocationMasterController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cache::remember('location', now()->addDecade(), function () {
            return LocationResource::collection(Location::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        return LocationResource::make(Location::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $location_active = Location::where('location_status', 1)
            ->where('id', $id)
            ->first();

        if ($location_active) {
            return new LocationResource($location_active);
        }

        return response()->json(['message' => 'Location Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {

        $old_location = Location::where('location_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_location) {
            $old_location->update($request->validated());
            return  LocationResource::make($old_location);
        }

        return response()->json(['message' => 'Location Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_location = Location::where('id', $id)
            ->first();
        if ($del_location) {

            $status=($del_location->location_status==0)?1:0;
            $del_location->update([$del_location->location_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Location Not found'], 404);
        }
    }
}