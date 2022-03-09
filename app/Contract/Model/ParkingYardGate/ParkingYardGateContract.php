<?php

namespace App\Contract\Model\ParkingYardGate;



trait ParkingYardGateContract
{

   use ParkingYardGateRelation;

    /**
     * this query to user to show  vehicle on Parking-yard-gate table
     * @return mixed
     */

    public function scopeParkingstatus($query)
    {
        return $query->where('parking_status', '3')
        ->orWhere('parking_status', '2')
        ->orderBy('id', 'DESC');
    }

    /**
     * this query to user to show gate-in vehicle on Vehicle-Inspection table
     * @return mixed
     */
    public function scopeGate_in_status($query)
    {
        return $query->where('parking_status', '1')
        ->where('vehicle_inspection_status', null)
        ->where('maintenance_status',null)
        ->where('vehicle_inspection_id',null)
        ->where('trip_sto_status',null)
        ->orderBy('id', 'DESC');

    }

    /**
     * this query  to show vehicle on trip-sheet creation table
     * @return mixed
     */

    public function scopeReady_to_load($query)
    {
        return $query->where('parking_status', '1')
            ->where('maintenance_status', null)
            ->where('vehicle_inspection_status',1)
            ->where('vendor_creation_status',1)
            ->orwhere('trip_sto_status',1)
            ->where('vendor_creation_status',1)
            ->orderBy('id', 'DESC');
    }


    /**
     * this query  to get single-vehicle on trip-sheet creation table
     * @return mixed
     */

    public function scopeInfo_of_own_contract_vehicle_tripsheet($query)
    {
        return $query->with('Vehicle_Type')
        ->with('Vehicle_Inspection_Trip')
        ->with('Vehicle_Capacity')
        ->with('Vehicle_Location')
        ->with('Driver_Info');
    }

    /**
     * this query  to get single-vehicle on trip-sheet creation RM-STO Flow table
     * @return mixed
     */

    public function scopeInfo_of_hire_romsto_vehicle_tripsheet($query)
    {
        return $query->with('Vehicle_Type')
        ->with('Vehicle_Inspection_Trip')
        ->with('Vehicle_Documents')
        ->with('Vehicle_Location')
        ->with('Vendor_Info','Vendor_Info.Shed_Info')
        ->with('Vehicle_Capacity');
    }



    /**
     * this query  to get single-vehicle on trip-sheet creation Normal Flow
     * @return mixed
     */

    public function scopeInfo_of_normal_vehicle_tripsheet($query)
    {
        return $query->with('Vehicle_Type')
        ->with('Vehicle_Inspection_Trip')
        ->with('Vehicle_Location')
        ->with('Vendor_Info','Vendor_Info.Shed_Info')
        ->with('Vehicle_Capacity');
    }


}
