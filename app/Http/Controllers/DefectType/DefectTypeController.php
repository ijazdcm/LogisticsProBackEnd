<?php

namespace App\Http\Controllers\DefectType;

use App\Http\Controllers\Controller;
use App\Http\Requests\DefectType\DefectTypeStoreRequest;
use App\Http\Resources\DefectType\DefectTypeResource;
use App\Models\DefectType\Defect_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DefectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DefectTypeResource::collection(Cache::remember('defect_type',now()->addDecade(),function()
        {
                  return Defect_Type::active()->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DefectTypeStoreRequest $request)
    {
        return  DefectTypeResource::make(Defect_Type::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $defect_type = Defect_Type::active()
            ->where('id', $id)
            ->first();

        if ($defect_type) {
            return new DefectTypeResource($defect_type);
        }

        return response()->json(['message' => 'Defect Type Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DefectTypeStoreRequest $request, $id)
    {
        $defect_type = Defect_Type::active()
        ->where('id', $id)
        ->first();

        if ($defect_type) {
            $defect_type->update($request->validated());
            return new DefectTypeResource($defect_type);
        }

        return response()->json(['message' => 'Defect Type  Not found'], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $defect_type = Defect_Type::active()
        ->where('id', $id)
        ->first();

        if ($defect_type) {
            $defect_type->update([$defect_type->defect_type_status = 0]);

            return response('', 204)->header('Content-Type', 'application/json');

        } else {

            return response()->json(['message' => 'Department Not found'], 404);

        }
    }
}
