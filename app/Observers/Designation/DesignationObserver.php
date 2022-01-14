<?php

namespace App\Observers\Designation;

use App\Models\Designation\Designation;
use Illuminate\Support\Facades\Cache;

class DesignationObserver
{
    /**
     * Handle the Designation "created" event.
     *
     * @param  \App\Models\Designation  $designation
     * @return void
     */
    public function created(Designation $designation)
    {
        Cache::forget('designation');
    }

    /**
     * Handle the Designation "updated" event.
     *
     * @param  \App\Models\Designation  $designation
     * @return void
     */
    public function updated(Designation $designation)
    {
        Cache::forget('designation');
    }

    /**
     * Handle the Designation "deleted" event.
     *
     * @param  \App\Models\Designation  $designation
     * @return void
     */
    public function deleted(Designation $designation)
    {
    }

    /**
     * Handle the Designation "restored" event.
     *
     * @param  \App\Models\Designation  $designation
     * @return void
     */
    public function restored(Designation $designation)
    {
        //
    }

    /**
     * Handle the Designation "force deleted" event.
     *
     * @param  \App\Models\Designation  $designation
     * @return void
     */
    public function forceDeleted(Designation $designation)
    {
        //
    }
}
