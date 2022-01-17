<?php

namespace App\Observers\DieselVendor;

use App\Models\Diesel\Diesel_Vendor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DieselVendorInfoObserver
{
    /**
     * Handle the Diesel_Vendor "created" event.
     *
     * @param  \App\Models\Diesel_Vendor  $diesel_Vendor
     * @return void
     */
    public function created(Diesel_Vendor $diesel_Vendor)
    {

        $diesel_Vendor->vendor_code=rand(999,9999).$diesel_Vendor->id;

        $diesel_Vendor->save();

        Cache::forget('diesel_vendor');
    }

    /**
     * Handle the Diesel_Vendor "updated" event.
     *
     * @param  \App\Models\Diesel_Vendor  $diesel_Vendor
     * @return void
     */
    public function updated(Diesel_Vendor $diesel_Vendor)
    {
        Cache::forget('diesel_vendor');
    }

    /**
     * Handle the Diesel_Vendor "deleted" event.
     *
     * @param  \App\Models\Diesel_Vendor  $diesel_Vendor
     * @return void
     */
    public function deleted(Diesel_Vendor $diesel_Vendor)
    {
        Cache::forget('diesel_vendor');
    }

    /**
     * Handle the Diesel_Vendor "restored" event.
     *
     * @param  \App\Models\Diesel_Vendor  $diesel_Vendor
     * @return void
     */
    public function restored(Diesel_Vendor $diesel_Vendor)
    {
        //
    }

    /**
     * Handle the Diesel_Vendor "force deleted" event.
     *
     * @param  \App\Models\Diesel_Vendor  $diesel_Vendor
     * @return void
     */
    public function forceDeleted(Diesel_Vendor $diesel_Vendor)
    {
        //
    }
}
