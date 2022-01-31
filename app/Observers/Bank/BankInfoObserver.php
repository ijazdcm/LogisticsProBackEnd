<?php

namespace App\Observers\Bank;

use App\Models\Bank\Bank_info;
use Illuminate\Support\Facades\Cache;

class BankInfoObserver
{
    /**
     * Handle the Bank_info "created" event.
     *
     * @param  \App\Models\Bank\Bank_info  $bank_info
     * @return void
     */
    public function created(Bank_info $bank_info)
    {
        Cache::forget('bank');
    }

    /**
     * Handle the Bank_info "updated" event.
     *
     * @param  \App\Models\Bank_info  $bank_info
     * @return void
     */
    public function updated(Bank_info $bank_info)
    {
        Cache::forget('bank');
    }

    /**
     * Handle the Bank_info "deleted" event.
     *
     * @param  \App\Models\Bank_info  $bank_info
     * @return void
     */
    public function deleted(Bank_info $bank_info)
    {
        Cache::forget('bank');
    }

    /**
     * Handle the Bank_info "restored" event.
     *
     * @param  \App\Models\Bank_info  $bank_info
     * @return void
     */
    public function restored(Bank_info $bank_info)
    {
        Cache::forget('bank');
    }

    /**
     * Handle the Bank_info "force deleted" event.
     *
     * @param  \App\Models\Bank_info  $bank_info
     * @return void
     */
    public function forceDeleted(Bank_info $bank_info)
    {
        Cache::forget('bank');
    }
}
