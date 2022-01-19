<?php

namespace App\Observers\Status;

use App\Models\Status\Status;
use Illuminate\Support\Facades\Cache;

class StatusObserver
{
    /**
     * Handle the Status "created" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function created(Status $status)
    {
        Cache::forget('status');
    }

    /**
     * Handle the Status "updated" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function updated(Status $status)
    {
        Cache::forget('status');
    }

    /**
     * Handle the Status "deleted" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function deleted(Status $status)
    {
    }

    /**
     * Handle the Status "restored" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function restored(Status $status)
    {
        //
    }

    /**
     * Handle the Status "force deleted" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function forceDeleted(Status $status)
    {
        //
    }
}
