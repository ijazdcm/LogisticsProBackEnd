<?php

namespace App\Observers\MaterialDescription;

use App\Models\MaterialDescription\MaterialDescription;
use Illuminate\Support\Facades\Cache;

class MaterialDescriptionObserver
{
    /**
     * Handle the MaterialDescription "created" event.
     *
     * @param  \App\Models\MaterialDescription  $material_description
     * @return void
     */
    public function created(MaterialDescription $material_description)
    {
        Cache::forget('material_description');
    }

    /**
     * Handle the MaterialDescription "updated" event.
     *
     * @param  \App\Models\MaterialDescription  $material_description
     * @return void
     */
    public function updated(MaterialDescription $material_description)
    {
        Cache::forget('material_description');
    }

    /**
     * Handle the MaterialDescription "deleted" event.
     *
     * @param  \App\Models\MaterialDescription  $material_description
     * @return void
     */
    public function deleted(MaterialDescription $material_description)
    {
        Cache::forget('material_description');
    }

    /**
     * Handle the MaterialDescription "restored" event.
     *
     * @param  \App\Models\MaterialDescription  $material_description
     * @return void
     */
    public function restored(MaterialDescription $material_description)
    {
        //
    }

    /**
     * Handle the MaterialDescription "force deleted" event.
     *
     * @param  \App\Models\MaterialDescription  $material_description
     * @return void
     */
    public function forceDeleted(MaterialDescription $material_description)
    {
        //
    }
}
