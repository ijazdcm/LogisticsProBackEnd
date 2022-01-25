<?php

namespace App\Observers\DefectType;

use App\Models\DefectType\Defect_Type;
use Illuminate\Support\Facades\Cache;

class DefectTypeObserver
{
    /**
     * Handle the Defect_Type "created" event.
     *
     * @param  \App\Models\Defect_Type  $defect_Type
     * @return void
     */
    public function created(Defect_Type $defect_Type)
    {
        Cache::forget('defect_type');
    }

    /**
     * Handle the Defect_Type "updated" event.
     *
     * @param  \App\Models\Defect_Type  $defect_Type
     * @return void
     */
    public function updated(Defect_Type $defect_Type)
    {
        Cache::forget('defect_type');
    }

    /**
     * Handle the Defect_Type "deleted" event.
     *
     * @param  \App\Models\Defect_Type  $defect_Type
     * @return void
     */
    public function deleted(Defect_Type $defect_Type)
    {
        Cache::forget('defect_type');
    }

    /**
     * Handle the Defect_Type "restored" event.
     *
     * @param  \App\Models\Defect_Type  $defect_Type
     * @return void
     */
    public function restored(Defect_Type $defect_Type)
    {
        //
    }

    /**
     * Handle the Defect_Type "force deleted" event.
     *
     * @param  \App\Models\Defect_Type  $defect_Type
     * @return void
     */
    public function forceDeleted(Defect_Type $defect_Type)
    {
        //
    }
}
