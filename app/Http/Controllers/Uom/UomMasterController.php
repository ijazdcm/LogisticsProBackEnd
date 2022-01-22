<?php

namespace App\Http\Controllers\Uom;

use App\Http\Controllers\Controller;
use App\Http\Requests\Uom\UomRequest;
use App\Http\Resources\Uom\UomResource;
use App\Models\Uom\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UomMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('uom', now()->addDecade(), function () {

            // return UomResource::collection(Uom::where('uom_status', 1)->get());
            return UomResource::collection(Uom::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UomRequest $request)
    {
        return new UomResource(Uom::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $uom_active = Uom::all()
            ->where('id', $id)
            ->first();

        if ($uom_active) {
            return new UomResource($uom_active);
        }

        return response()->json(['message' => 'Uom Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UomRequest $request, $id)
    {

        $old_uom = Uom::all()
            ->where('id', $id)
            ->first();
        if ($old_uom) {
            $old_uom->update($request->validated());
            return new UomResource($old_uom);
        }

        return response()->json(['message' => 'Uom Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_uom = Uom::all()
            ->where('id', $id)
            ->first();
        if ($del_uom) {
            // $del_uom->update([$del_uom->uom_status = 0]);
            $del_uom->delete();
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Uom Not found'], 404);
        }
    }
}
