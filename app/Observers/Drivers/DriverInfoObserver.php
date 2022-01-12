<?php

namespace App\Observers\Drivers;

use App\Models\Driver\Driver_Info;
use Illuminate\Support\Facades\Cache;

class DriverInfoObserver
{
    /**
     * Handle the Driver_Info "created" event.
     *
     * @param  \App\Models\Driver_Info  $driver_Info
     * @return void
     */
    public function created(Driver_Info $driver_Info)
    {
        Cache::forget('drivers');
    }

    /**
     * Handle the Driver_Info "updated" event.
     *
     * @param  \App\Models\Driver_Info  $driver_Info
     * @return void
     */
    public function updated(Driver_Info $driver_Info)
    {
        Cache::forget('drivers');
    }

    /**
     * Handle the Driver_Info "deleted" event.
     *
     * @param  \App\Models\Driver_Info  $driver_Info
     * @return void
     */
    public function deleted(Driver_Info $driver_Info)
    {
        Cache::forget('drivers');
    }

    /**
     * Handle the Driver_Info "restored" event.
     *
     * @param  \App\Models\Driver_Info  $driver_Info
     * @return void
     */
    public function restored(Driver_Info $driver_Info)
    {
        //
    }

    /**
     * Handle the Driver_Info "force deleted" event.
     *
     * @param  \App\Models\Driver_Info  $driver_Info
     * @return void
     */
    public function forceDeleted(Driver_Info $driver_Info)
    {
        //
    }
}
