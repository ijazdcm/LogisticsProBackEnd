<?php

namespace App\Observers\Customer;

use App\Models\Customer\Customer;
use App\Models\Customer\Customer_info;
use Illuminate\Support\Facades\Cache;

class CustomerObserver
{
    public function created(Customer_info $customer_info)
    {
        Cache::forget('customers');
    }

    public function updated(Customer_info $customer_info)
    {
        Cache::forget('customers');
    }

    public function deleted(Customer_info $customer_info)
    {
        Cache::forget('customers');
    }
}
