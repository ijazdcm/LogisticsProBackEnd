<?php

namespace App\Observers\PreviousLoadDetails;

use App\Models\PreviousLoadDetails\PreviousLoadDetails;
use Illuminate\Support\Facades\Cache;

class PreviousLoadDetailsObserver
{
    /**
     * Handle the PreviousLoadDetails "created" event.
     *
     * @param  \App\Models\PreviousLoadDetails  $previous_load_details
     * @return void
     */
    public function created(PreviousLoadDetails $previous_load_details)
    {
        Cache::forget('previous_load_details');
    }

    /**
     * Handle the PreviousLoadDetails "updated" event.
     *
     * @param  \App\Models\PreviousLoadDetails  $previous_load_details
     * @return void
     */
    public function updated(PreviousLoadDetails $previous_load_details)
    {
        Cache::forget('previous_load_details');
    }

    /**
     * Handle the PreviousLoadDetails "deleted" event.
     *
     * @param  \App\Models\PreviousLoadDetails  $previous_load_details
     * @return void
     */
    public function deleted(PreviousLoadDetails $previous_load_details)
    {
    }

    /**
     * Handle the PreviousLoadDetails "restored" event.
     *
     * @param  \App\Models\PreviousLoadDetails  $previous_load_details
     * @return void
     */
    public function restored(PreviousLoadDetails $previous_load_details)
    {
        //
    }

    /**
     * Handle the PreviousLoadDetails "force deleted" event.
     *
     * @param  \App\Models\PreviousLoadDetails  $previous_load_details
     * @return void
     */
    public function forceDeleted(PreviousLoadDetails $previous_load_details)
    {
        //
    }
}
