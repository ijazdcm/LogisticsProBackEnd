<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Designation\DesignationRequest;
use App\Http\Resources\Designation\DesignationResource;
use App\Models\Designation\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DesignationMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('designation', now()->addDecade(), function () {

            return DesignationResource::collection(Designation::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationRequest $request)
    {
        return DesignationResource::make(Designation::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $designation_active = Designation::where('designation_status', 1)
            ->where('id', $id)
            ->first();

        if ($designation_active) {
            return new DesignationResource($designation_active);
        }

        return response()->json(['message' => 'Designation Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignationRequest $request, $id)
    {

        $old_designation = Designation::where('designation_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_designation) {
            $old_designation->update($request->validated());
            return  DesignationResource::make($old_designation);
        }

        return response()->json(['message' => 'Designation Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_designation = Designation::where('id', $id)
            ->first();
        if ($del_designation) {

            $status=($del_designation->designation_status==0)?1:0;
            $del_designation->update([$del_designation->designation_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Designation Not found'], 404);
        }
    }
}
