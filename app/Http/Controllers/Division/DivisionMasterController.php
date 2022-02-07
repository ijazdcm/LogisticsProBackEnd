<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Http\Requests\Division\DivisionRequest;
use App\Http\Resources\Division\DivisionResource;
use App\Models\Divison\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DivisionMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('division', now()->addDecade(), function () {

            return DivisionResource::collection(Division::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        return new DivisionResource(Division::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $division_active = Division::where('division_status', 1)
            ->where('id', $id)
            ->first();

        if ($division_active) {
            return new DivisionResource($division_active);
        }

        return response()->json(['message' => 'Division Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, $id)
    {

        $old_division = Division::where('division_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_division) {
            $old_division->update($request->validated());
            return new DivisionResource($old_division);
        }

        return response()->json(['message' => 'Division Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_division = Division::where('id', $id)
            ->first();
        if ($del_division) {

            $status = ($del_division->division_status == 0) ? 1 : 0;

            $del_division->update([$del_division->division_status = $status]);

            return response('', 204)->header('Content-Type', 'application/json');
        }
        else {
            return response()->json(['message' => 'Division Not found'], 404);
        }
    }
}
