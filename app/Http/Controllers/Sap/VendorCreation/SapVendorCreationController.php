<?php

namespace App\Http\Controllers\Sap\VendorCreation;

use App\Helper\Sap\SapHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vendor\VendorInfoResource;
use App\Models\Vendors\Vendor_Info;
use Illuminate\Http\Request;

class SapVendorCreationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {


       // this Helper function is used to push data to Sap & Get back the response
       $response = SapHelper::PushToSap('/zven_create_lp/Vendorcreation',$request->all());

         if($response!=null)
         {

            /*this section update the vendor code returned from SAP
                to respective user
            */
            $vendor_info=Vendor_Info::where('pan_card_number','=',(string) $response[0]['PAN_NO'])->update(['vendor_code'=>(int)$response[0]['VENDOR_NO']]);


            return  $vendor_info ? response(json_encode(["message"=>"Vendor Created is SAP Successfully"]),200):null;
         }

         response(json_encode(["message"=>"Something Went Wrong in SAP"]),500);

    }
}
