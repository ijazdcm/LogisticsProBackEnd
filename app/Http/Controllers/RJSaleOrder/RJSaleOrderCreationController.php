<?php

namespace App\Http\Controllers\RJSaleOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\RJSaleOrder\RJSaleOrderCreationRequest;

use App\Http\Resources\RJSaleOrder\RJSaleOrderCreationResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\RJSaleOrder\RJSaleOrderCreation;

use Illuminate\Support\Facades\Log;

class RJSaleOrderCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RJSaleOrderCreation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RJSaleOrderCreationRequest $request)
    {
        DB::transaction(function () use ($request) {
            RJSaleOrderCreation::create($request->validated());
        });

        return RJSaleOrderCreationResource::make($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
