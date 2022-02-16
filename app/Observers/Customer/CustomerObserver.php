<?php

namespace App\Observers\Customer;

use App\Models\Customer\Customer;
use Illuminate\Support\Facades\Cache;

class CustomerObserver
{
    public function created(Customer $customer_info)
    {
        Cache::forget('customers');
    }
   
    public function updated(Customer $customer_info)
    {
        Cache::forget('customers');
    }

    public function deleted(Customer $customer_info)
    {
        Cache::forget('customers');
    }
}
