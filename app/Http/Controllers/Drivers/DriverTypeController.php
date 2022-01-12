<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Drivers\DriverTypeResource;
use App\Models\Driver\Driver_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DriverTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       return  DriverTypeResource::collection(Cache::remember('driver_type',now()->addDecade(),function(){

               return Driver_Type::where('driver_type_status',1)->get();
        }));
    }
}
