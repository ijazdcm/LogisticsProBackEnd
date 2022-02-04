<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Drivers\DriverInfoResource;
use App\Models\Driver\Driver_Info;
use Illuminate\Http\Request;

class DriversActiveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return DriverInfoResource::collection(Driver_Info::with('driver__types')
        ->avaiable()
        ->get());
    }
}
