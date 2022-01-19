<?php

namespace App\Observers\RejectionReason;

use App\Models\RejectionReason\RejectionReason;
use Illuminate\Support\Facades\Cache;

class RejectionReasonObserver
{
    /**
     * Handle the RejectionReason "created" event.
     *
     * @param  \App\Models\RejectionReason  $rejection_reason
     * @return void
     */
    public function created(RejectionReason $rejection_reason)
    {
        Cache::forget('rejection_reason');
    }

    /**
     * Handle the RejectionReason "updated" event.
     *
     * @param  \App\Models\RejectionReason  $rejection_reason
     * @return void
     */
    public function updated(RejectionReason $rejection_reason)
    {
        Cache::forget('rejection_reason');
    }

    /**
     * Handle the RejectionReason "deleted" event.
     *
     * @param  \App\Models\RejectionReason  $rejection_reason
     * @return void
     */
    public function deleted(RejectionReason $rejection_reason)
    {
    }

    /**
     * Handle the RejectionReason "restored" event.
     *
     * @param  \App\Models\RejectionReason  $rejection_reason
     * @return void
     */
    public function restored(RejectionReason $rejection_reason)
    {
        //
    }

    /**
     * Handle the RejectionReason "force deleted" event.
     *
     * @param  \App\Models\RejectionReason  $rejection_reason
     * @return void
     */
    public function forceDeleted(RejectionReason $rejection_reason)
    {
        //
    }
}
