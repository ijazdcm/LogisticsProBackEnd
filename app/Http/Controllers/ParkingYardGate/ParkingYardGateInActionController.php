<?php

namespace App\Http\Controllers\ParkingYardGate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingYardGate\Parking_Yard_Gate;

class ParkingYardGateInActionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
         if(Parking_Yard_Gate::where('id',$id)->update(['parking_status'=>Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['GATE_IN']]))
         {
            return  response()->json(['message' => 'Sucesss'], 201);
         }
         return response()->json(['message' => 'Something Went Wrong'], 500);


    }
}
