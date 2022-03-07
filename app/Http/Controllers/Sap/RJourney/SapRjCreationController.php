<?php

namespace App\Http\Controllers\Sap\RJourney;

use App\Helper\Sap\SapHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sap\RjSaleOrderRequest;

class SapRjCreationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RjSaleOrderRequest $request)
    {
        // this Helper function is used to push data to Sap & Get back the response
        $response = SapHelper::PushToSap('/ZSALE_ORDER_LP/Saleordercreation', $request->validated());

        if ($response != null) {
            return  response(json_encode($response[0]), 200);
        }

        response(json_encode(["message" => "Something Went Wrong in SAP"]), 500);
    }
}
