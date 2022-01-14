<?php

namespace App\Observers\Vehicle;

use App\Models\Vehicles\Vehicle_Capacity;
use Illuminate\Support\Facades\Cache;

class VehicleCapacityObserver
{
    /**
     * Handle the Vehicle_Capacity "created" event.
     *
     * @param  \App\Models\Vehicle_Capacity  $vehicle_Capacity
     * @return void
     */
    public function created(Vehicle_Capacity $vehicle_Capacity)
    {
        Cache::forget('vehicle_capacity');
    }

    /**
     * Handle the Vehicle_Capacity "updated" event.
     *
     * @param  \App\Models\Vehicle_Capacity  $vehicle_Capacity
     * @return void
     */
    public function updated(Vehicle_Capacity $vehicle_Capacity)
    {
        Cache::forget('vehicle_capacity');
    }

    /**
     * Handle the Vehicle_Capacity "deleted" event.
     *
     * @param  \App\Models\Vehicle_Capacity  $vehicle_Capacity
     * @return void
     */
    public function deleted(Vehicle_Capacity $vehicle_Capacity)
    {
    }

    /**
     * Handle the Vehicle_Capacity "restored" event.
     *
     * @param  \App\Models\Vehicle_Capacity  $vehicle_Capacity
     * @return void
     */
    public function restored(Vehicle_Capacity $vehicle_Capacity)
    {
        //
    }

    /**
     * Handle the Vehicle_Capacity "force deleted" event.
     *
     * @param  \App\Models\Vehicle_Capacity  $vehicle_Capacity
     * @return void
     */
    public function forceDeleted(Vehicle_Capacity $vehicle_Capacity)
    {
        //
    }
}
