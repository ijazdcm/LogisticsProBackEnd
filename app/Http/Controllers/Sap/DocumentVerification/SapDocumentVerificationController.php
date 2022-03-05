<?php

namespace App\Http\Controllers\Sap\DocumentVerification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SapDocumentVerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $pan_card_no)
    {

        $response = Http::nagasap()
            ->get("/zdoc_ver_LP/DocumentationVerification",['sap-client'=>env('SAP_CLIENT'),'PAN_NO'=>$pan_card_no]);

        return $response->successful() ? $response->json() : response()->json(['message' => 'something went wrong on SAP'], 500);


    }
}
