<?php

namespace App\Http\Controllers\PreviousLoadDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreviousLoadDetails\PreviousLoadDetailsRequest;
use App\Http\Resources\PreviousLoadDetails\PreviousLoadDetailsResource;
use App\Models\PreviousLoadDetails\PreviousLoadDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PreviousLoadDetailsMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cache::remember('previous_load_details', now()->addDecade(), function () {

            return PreviousLoadDetailsResource::collection(PreviousLoadDetails::where('previous_load_status', 1)->get());
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreviousLoadDetailsRequest $request)
    {
        return new PreviousLoadDetailsResource(PreviousLoadDetails::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $previous_load_details_active = PreviousLoadDetails::where('previous_load_status', 1)
            ->where('id', $id)
            ->first();

        if ($previous_load_details_active) {
            return new PreviousLoadDetailsResource($previous_load_details_active);
        }

        return response()->json(['message' => 'Previous Load Detail Not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreviousLoadDetails\PreviousLoadDetails  $previousLoadDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(PreviousLoadDetails $previousLoadDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreviousLoadDetailsRequest $request, $id)
    {
        $old_previous_load_detail = PreviousLoadDetails::where('previous_load_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_previous_load_detail) {
            $old_previous_load_detail->update($request->validated());
            return new PreviousLoadDetailsResource($old_previous_load_detail);
        }

        return response()->json(['message' => 'Previous Load Detail Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_previous_load_detail = PreviousLoadDetails::where('previous_load_status', 1)
            ->where('id', $id)
            ->first();
        if ($del_previous_load_detail) {
            $del_previous_load_detail->update([$del_previous_load_detail->previous_load_status = 0]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Previous Load Detail Not found'], 404);
        }
    }
}
