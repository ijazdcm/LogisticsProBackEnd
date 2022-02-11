<?php

namespace App\Http\Resources\VehicleMaintenance;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkorderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $url = 'http://10.10.63.134:8001/Zlog_pro_wo/Workorder?sap-client=900';

        $userName = 'trainee5'; $password = 'Sbharu';
        $headers = array('Content-Type: application/json', 'Authorization: Basic '. base64_encode($userName.':'.$password));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // return parent::toArray($request);
        return json_decode($result);
        return $result;
    }
}
