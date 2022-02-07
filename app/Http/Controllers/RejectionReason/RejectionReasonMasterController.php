<?php

namespace App\Http\Controllers\RejectionReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\RejectionReason\RejectionReasonRequest;
use App\Http\Resources\RejectionReason\RejectionReasonResource;
use App\Models\RejectionReason\RejectionReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RejectionReasonMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('rejection_reason', now()->addDecade(), function () {
            return RejectionReasonResource::collection(RejectionReason::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RejectionReasonRequest $request)
    {
        return  RejectionReasonResource::make(RejectionReason::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $rejection_reason_active = RejectionReason::where('rejection_reason_status', 1)
            ->where('id', $id)
            ->first();

        if ($rejection_reason_active) {
            return  RejectionReasonResource::make($rejection_reason_active);
        }

        return response()->json(['message' => 'Rejection Reason Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RejectionReasonRequest $request, $id)
    {

        $old_rejection_reason = RejectionReason::where('rejection_reason_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_rejection_reason) {
            $old_rejection_reason->update($request->validated());
            return  RejectionReasonResource::make($old_rejection_reason);
        }

        return response()->json(['message' => 'Rejection Reason Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_rejection_reason = RejectionReason::where('id', $id)
            ->first();

         $status=($del_rejection_reason->rejection_reason_status==0)?1:0;


        if ($del_rejection_reason) {
            $del_rejection_reason->update([$del_rejection_reason->rejection_reason_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Rejection Reason Not found'], 404);
        }
    }
}
