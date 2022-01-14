<?php

namespace App\Observers\Division;

use App\Models\Divison\Division;
use Illuminate\Support\Facades\Cache;

class DivisionObserver
{
    /**
     * Handle the Division "created" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function created(Division $division)
    {
        Cache::forget('division');
    }

    /**
     * Handle the Division "updated" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function updated(Division $division)
    {
        Cache::forget('division');
    }

    /**
     * Handle the Division "deleted" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function deleted(Division $division)
    {
    }

    /**
     * Handle the Division "restored" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function restored(Division $division)
    {
        //
    }

    /**
     * Handle the Division "force deleted" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function forceDeleted(Division $division)
    {
        //
    }
}
