<?php

namespace App\Providers;

use App\Events\Auth\SendOtpEvent;
use App\Listeners\Auth\SendOtpEventListener;
use App\Models\Bank\Bank_info;
use App\Models\DefectType\Defect_Type;
use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\Diesel\Diesel_Vendor;
use App\Models\Divison\Division;
use App\Models\Driver\Driver_Info;
use App\Models\Location\Location;
use App\Models\MaterialDescription\MaterialDescription;
use App\Models\PreviousLoadDetails\PreviousLoadDetails;
use App\Models\RejectionReason\RejectionReason;
use App\Models\Shed\Shed_Info;
use App\Models\Status\Status;
use App\Models\Uom\Uom;
use App\Models\User;
use App\Models\Vehicles\Vehicle_Capacity;
use App\Models\Vehicles\Vehicle_Info;
use App\Models\Vendors\Vendor_Info;
use App\Observers\Bank\BankInfoObserver;
use App\Observers\DefectType\DefectTypeObserver;
use App\Observers\Drivers\DriverInfoObserver;
use App\Observers\Vehicle\VehicleCapacityObserver;
use App\Observers\Vehicle\VehicleInfoObserver;
use App\Observers\Division\DivisionObserver;

use App\Observers\Department\DepartmentObserver;
use App\Observers\Designation\DesignationObserver;
use App\Observers\DieselVendor\DieselVendorInfoObserver;
use App\Observers\Location\LocationObserver;
use App\Observers\MaterialDescription\MaterialDescriptionObserver;
use App\Observers\PreviousLoadDetails\PreviousLoadDetailsObserver;
use App\Observers\RejectionReason\RejectionReasonObserver;
use App\Observers\Sheds\ShedInfoObserver;
use App\Observers\Status\StatusObserver;
use App\Observers\Uom\UomObserver;
use App\Observers\User\UserObserver;
use App\Observers\Vendor\VendorInfoObserver;


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
        SendOtpEvent::class=>[SendOtpEventListener::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Vehicle_Capacity::observe(VehicleCapacityObserver::class);
        Vehicle_Info::observe(VehicleInfoObserver::class);
        Driver_Info::observe(DriverInfoObserver::class);

        Division::observe(DivisionObserver::class); // Added By Alwin
        Uom::observe(UomObserver::class); // Added By Alwin
        MaterialDescription::observe(MaterialDescriptionObserver::class); // Added By Alwin
        Department::observe(DepartmentObserver::class); // Added By Alwin
        Designation::observe(DesignationObserver::class); // Added By Alwin
        RejectionReason::observe(RejectionReasonObserver::class); // Added By Alwin
        PreviousLoadDetails::observe(PreviousLoadDetailsObserver::class); // Added By Alwin
        Status::observe(StatusObserver::class); // Added By Alwin

        Shed_Info::observe(ShedInfoObserver::class); // Added By Saravana Sai
        Vendor_Info::observe(VendorInfoObserver::class); // Added By Saravana Sai
        Diesel_Vendor::observe(DieselVendorInfoObserver::class); // Added By Saravana Sai
        Defect_Type::observe(DefectTypeObserver::class); // Added By Saravana Sai
        Bank_info::observe(BankInfoObserver::class); // Added By Saravana Sai
        User::observe(UserObserver::class); // Added By Saravana Sai
        Location::observe(LocationObserver::class); //Added By Parthiban

    }
}
