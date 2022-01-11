<?php

namespace App\Observers\Vehicle;

use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Support\Facades\Cache;

class VehicleInfoObserver
{
    /**
     * Handle the Vehicle_Info "created" event.
     *
     * @param  \App\Models\Vehicles\Vehicle_Info  $vehicle_Info
     * @return void
     */
    public function created(Vehicle_Info $vehicle_Info)
    {
        Cache::forget('vehicle_info');
    }

    /**
     * Handle the Vehicle_Info "updated" event.
     *
     * @param  \App\Models\Vehicle_Info  $vehicle_Info
     * @return void
     */
    public function updated(Vehicle_Info $vehicle_Info)
    {
        Cache::forget('vehicle_info');
    }

    /**
     * Handle the Vehicle_Info "deleted" event.
     *
     * @param  \App\Models\Vehicle_Info  $vehicle_Info
     * @return void
     */
    public function deleted(Vehicle_Info $vehicle_Info)
    {
        //
    }

    /**
     * Handle the Vehicle_Info "restored" event.
     *
     * @param  \App\Models\Vehicle_Info  $vehicle_Info
     * @return void
     */
    public function restored(Vehicle_Info $vehicle_Info)
    {
        //
    }

    /**
     * Handle the Vehicle_Info "force deleted" event.
     *
     * @param  \App\Models\Vehicle_Info  $vehicle_Info
     * @return void
     */
    public function forceDeleted(Vehicle_Info $vehicle_Info)
    {
        //
    }
}
