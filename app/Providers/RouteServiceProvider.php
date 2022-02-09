<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';


    /**
     * The path to the "V1 api" route for your application.
     *
     *
     *
     * @var array
     */
    protected array $routes_path=[

        ['folder'=>'Auth','file'=>'auth_routes'],
        ['folder'=>'Vehicle','file'=>'vehicle_routes'],
        ['folder'=>'Driver','file'=>'driver_routes'],
        ['folder'=>'Division','file'=>'division_routes'],
        ['folder'=>'Department','file'=>'department_routes'],
        ['folder'=>'Designation','file'=>'designation_routes'],
        ['folder'=>'Uom','file'=>'uom_routes'],
        ['folder'=>'MaterialDescription','file'=>'material_description_routes'],
        ['folder'=>'RejectionReason','file'=>'rejection_reason_routes'],
        ['folder'=>'PreviousLoadDetails','file'=>'previous_load_details_routes'],
        ['folder'=>'Status','file'=>'status_routes'],
        ['folder'=>'Shed','file'=>'shed_routes'],
        ['folder'=>'Vendor','file'=>'vendor_routes'],
        ['folder'=>'User','file'=>'user_routes'],
        ['folder'=>'ParkingYardGate','file'=>'parking_yard_gate_routes'],
        ['folder'=>'DefectType','file'=>'defect_type_routes'],
        ['folder'=>'Bank','file'=>'bank_routes'],
        ['folder'=>'VehicleInspection','file'=>'vehicle_inspection_routes'],
        ['folder'=>'VehicleInspection','file'=>'vehicle_inspection_routes'],
        ['folder'=>'Location','file'=>'location_routes'],


    ];

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

                //this code have been refactored by Saravana Sai

                foreach ($this->routes_path as $route) {
                    Route::prefix('api/v1/')
                    ->middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path("routes/v1/{$route['folder']}/{$route['file']}.php"));
                 }

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
