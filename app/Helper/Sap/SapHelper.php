<?php

namespace App\Helper\Sap;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SapHelper
{

    /**
     * CsrfToken function used to get token from Sap for authentication
     * Implemented by Saravana Sai
     * @param string $url
     * @return string
     */
    public static function PushToSap(string $url, array $data)
    {

        //this is get request to fetch the csrf-token form SAP
        $response = Http::nagasap()
            ->get($url, ['sap-client' => env('SAP_CLIENT')]);

        if ($response->successful()) {

          //this block is for to make a post request to same url to post a data to SAP
            $response = Http::nagasappost()
                ->withHeaders([
                'x-csrf-token' => $response->header('x-csrf-token'),
                'cookie' => 'MYSAPSSO2=' . $response->cookies()
                ->getCookieByName('MYSAPSSO2')
                ->getValue() . ';' . 'SAP_SESSIONID_NSY_900=' . $response->cookies()
                ->getCookieByName('SAP_SESSIONID_NSY_900')
                ->getValue() . ';' . 'sap-usercontext=sap-client=900'])
                ->post($url, [$data]);

            return $response->successful() ? $response->json() : null;

        }

    }


}
