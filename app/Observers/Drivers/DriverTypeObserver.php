<?php

namespace App\Observers\Drivers;

use App\Models\Driver_Type;

class DriverTypeObserver
{
    /**
     * Handle the Driver_Type "created" event.
     *
     * @param  \App\Models\Driver_Type  $driver_Type
     * @return void
     */
    public function created(Driver_Type $driver_Type)
    {
        //
    }

    /**
     * Handle the Driver_Type "updated" event.
     *
     * @param  \App\Models\Driver_Type  $driver_Type
     * @return void
     */
    public function updated(Driver_Type $driver_Type)
    {
        //
    }

    /**
     * Handle the Driver_Type "deleted" event.
     *
     * @param  \App\Models\Driver_Type  $driver_Type
     * @return void
     */
    public function deleted(Driver_Type $driver_Type)
    {
        //
    }

    /**
     * Handle the Driver_Type "restored" event.
     *
     * @param  \App\Models\Driver_Type  $driver_Type
     * @return void
     */
    public function restored(Driver_Type $driver_Type)
    {
        //
    }

    /**
     * Handle the Driver_Type "force deleted" event.
     *
     * @param  \App\Models\Driver_Type  $driver_Type
     * @return void
     */
    public function forceDeleted(Driver_Type $driver_Type)
    {
        //
    }
}
