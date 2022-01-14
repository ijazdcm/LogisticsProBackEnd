<?php

namespace App\Providers;

use App\Models\Divison\Division;
use App\Models\Driver\Driver_Info;
use App\Models\Driver\Driver_Type;
use App\Models\Vehicles\Vehicle_Capacity;
use App\Models\Vehicles\Vehicle_Info;
use App\Observers\Drivers\DriverInfoObserver;
use App\Observers\Drivers\DriverTypeObserver;
use App\Observers\Vehicle\VehicleCapacityObserver;
use App\Observers\Vehicle\VehicleInfoObserver;
use App\Observers\Division\DivisionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Vehicle_Capacity::observe(VehicleCapacityObserver::class); // Added By Alwin
        Vehicle_Info::observe(VehicleInfoObserver::class);
        Driver_Info::observe(DriverInfoObserver::class);
        Division::observe(DivisionObserver::class);
    }
}
