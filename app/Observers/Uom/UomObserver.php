<?php

namespace App\Observers\Uom;

use App\Models\Uom\Uom;
use Illuminate\Support\Facades\Cache;

class UomObserver
{
    /**
     * Handle the Uom "created" event.
     *
     * @param  \App\Models\Uom  $uom
     * @return void
     */
    public function created(Uom $uom)
    {
        Cache::forget('uom');
    }

    /**
     * Handle the Uom "updated" event.
     *
     * @param  \App\Models\Uom  $uom
     * @return void
     */
    public function updated(Uom $uom)
    {
        Cache::forget('uom');
    }

    /**
     * Handle the Uom "deleted" event.
     *
     * @param  \App\Models\Uom  $uom
     * @return void
     */
    public function deleted(Uom $uom)
    {
    }

    /**
     * Handle the Uom "restored" event.
     *
     * @param  \App\Models\Uom  $uom
     * @return void
     */
    public function restored(Uom $uom)
    {
        //
    }

    /**
     * Handle the Uom "force deleted" event.
     *
     * @param  \App\Models\Uom  $uom
     * @return void
     */
    public function forceDeleted(Uom $uom)
    {
        //
    }
}
