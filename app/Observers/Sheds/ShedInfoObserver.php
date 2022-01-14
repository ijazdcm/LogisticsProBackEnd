<?php

namespace App\Observers\Sheds;

use App\Models\Shed\Shed_Info;
use Illuminate\Support\Facades\Cache;

class ShedInfoObserver
{
    /**
     * Handle the Shed_Info "created" event.
     *
     * @param  \App\Models\Shed_Info  $shed_Info
     * @return void
     */
    public function created(Shed_Info $shed_Info)
    {
        Cache::forget('shed_info');
    }

    /**
     * Handle the Shed_Info "updated" event.
     *
     * @param  \App\Models\Shed_Info  $shed_Info
     * @return void
     */
    public function updated(Shed_Info $shed_Info)
    {
        Cache::forget('shed_info');
    }

    /**
     * Handle the Shed_Info "deleted" event.
     *
     * @param  \App\Models\Shed_Info  $shed_Info
     * @return void
     */
    public function deleted(Shed_Info $shed_Info)
    {
        Cache::forget('shed_info');
    }

    /**
     * Handle the Shed_Info "restored" event.
     *
     * @param  \App\Models\Shed_Info  $shed_Info
     * @return void
     */
    public function restored(Shed_Info $shed_Info)
    {
        //
    }

    /**
     * Handle the Shed_Info "force deleted" event.
     *
     * @param  \App\Models\Shed_Info  $shed_Info
     * @return void
     */
    public function forceDeleted(Shed_Info $shed_Info)
    {
        //
    }
}
