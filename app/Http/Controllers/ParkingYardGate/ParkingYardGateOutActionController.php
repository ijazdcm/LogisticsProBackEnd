<?php

namespace App\Http\Controllers\ParkingYardGate;

use App\Http\Controllers\Controller;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Http\Request;

class ParkingYardGateOutActionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        if(Parking_Yard_Gate::where('id',$id)->update(['parking_status'=>null]))
         {
            return  response()->json(['message' => 'Sucesss'], 201);
         }
         return response()->json(['message' => 'Something Went Wrong'], 500);
    }
}
