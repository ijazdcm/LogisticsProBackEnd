<?php

namespace App\Http\Controllers\VehicleMaintenance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VehicleMaintenanceWorkOrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sapResult = $this->sapGetData('http://10.10.63.134:8001/Zlog_pro_wo/Workorder?sap-client=900');

        return json_decode($sapResult);
    }

    // Get Sap Data from SAP
    public function sapGetData($url){
        $userName = 'trainee5'; $password = 'Sbharu';
        $headers = array('Content-Type: application/json', 'Authorization: Basic dHJhaW5lZTU6U2JoYXJ1');
        $headers = array('Content-Type: application/json', 'Authorization: Basic '. base64_encode($userName.':'.$password));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
     }
}
