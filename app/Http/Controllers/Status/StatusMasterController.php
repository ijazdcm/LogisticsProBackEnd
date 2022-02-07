<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;

use App\Http\Requests\Status\StatusRequest;

use App\Http\Resources\Status\StatusResource;

use App\Models\Status\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StatusMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('status', now()->addDecade(), function () {

            return StatusResource::collection(Status::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        return  StatusResource::make(Status::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $status_active = Status::where('remarks', 1)
            ->where('id', $id)
            ->first();

        if ($status_active) {
            return  StatusResource::make($status_active);
        }

        return response()->json(['message' => 'Status Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {

        $old_status = Status::where('remarks', 1)
            ->where('id', $id)
            ->first();
        if ($old_status) {
            $old_status->update($request->validated());
            return new StatusResource($old_status);
        }

        return response()->json(['message' => 'Status Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_status = Status::where('id', $id)
            ->first();
        if ($del_status) {


            $status=($del_status->remarks==0)?1:0;

            $del_status->update([$del_status->remarks = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Status Not found'], 404);
        }
    }
}
