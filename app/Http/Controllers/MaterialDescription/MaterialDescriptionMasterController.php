<?php

namespace App\Http\Controllers\MaterialDescription;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialDescription\MaterialDescriptionRequest;
use App\Http\Resources\MaterialDescription\MaterialDescriptionResource;
use App\Models\MaterialDescription\MaterialDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MaterialDescriptionMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('material_description', now()->addDecade(), function () {

            return MaterialDescriptionResource::collection(MaterialDescription::where('material_description_status', 1)->get());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialDescriptionRequest $request)
    {
        return new MaterialDescriptionResource(MaterialDescription::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $material_description_active = MaterialDescription::where('material_description_status', 1)
            ->where('id', $id)
            ->first();

        if ($material_description_active) {
            return new MaterialDescriptionResource($material_description_active);
        }

        return response()->json(['message' => 'Material Description Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialDescriptionRequest $request, $id)
    {

        $old_material_description = MaterialDescription::where('material_description_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_material_description) {
            $old_material_description->update($request->validated());
            return new MaterialDescriptionResource($old_material_description);
        }

        return response()->json(['message' => 'Material Description Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_material_description = MaterialDescription::where('material_description_status', 1)
            ->where('id', $id)
            ->first();
        if ($del_material_description) {
            $del_material_description->update([$del_material_description->material_description_status = 0]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Material Description Not found'], 404);
        }
    }
}
