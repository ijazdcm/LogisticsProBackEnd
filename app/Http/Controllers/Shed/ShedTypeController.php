<?php

namespace App\Http\Controllers\Shed;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shed\ShedTypeResource;
use App\Models\Shed\Shed_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShedTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
         return ShedTypeResource::collection(Cache::remember('shed_type',now()->addDecade(),function()
         {
             return Shed_Type::where('shed_type_status',1)->get();
         }));
    }
}
