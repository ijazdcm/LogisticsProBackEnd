<?php

namespace App\Observers\Vendor;

use App\Models\Vendors\Vendor_Info;
use Illuminate\Support\Facades\Cache;

class VendorInfoObserver
{
    /**
     * Handle the Vendor_Info "created" event.
     *
     * @param  \App\Models\Vendor_Info  $vendor_Info
     * @return void
     */
    public function created(Vendor_Info $vendor_Info)
    {
        Cache::forget('vendor_info');
    }

    /**
     * Handle the Vendor_Info "updated" event.
     *
     * @param  \App\Models\Vendor_Info  $vendor_Info
     * @return void
     */
    public function updated(Vendor_Info $vendor_Info)
    {
        Cache::forget('vendor_info');
    }

    /**
     * Handle the Vendor_Info "deleted" event.
     *
     * @param  \App\Models\Vendor_Info  $vendor_Info
     * @return void
     */
    public function deleted(Vendor_Info $vendor_Info)
    {
        Cache::forget('vendor_info');
    }

    /**
     * Handle the Vendor_Info "restored" event.
     *
     * @param  \App\Models\Vendor_Info  $vendor_Info
     * @return void
     */
    public function restored(Vendor_Info $vendor_Info)
    {
        //
    }

    /**
     * Handle the Vendor_Info "force deleted" event.
     *
     * @param  \App\Models\Vendor_Info  $vendor_Info
     * @return void
     */
    public function forceDeleted(Vendor_Info $vendor_Info)
    {
        //
    }
}
