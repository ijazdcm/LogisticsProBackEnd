<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
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

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Auth/auth_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Vehicle/vehicle_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Driver/driver_routes.php'));

            // -----------------------Added By Alwin------------(Start)--------------------------------
            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Division/division_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Department/department_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Designation/designation_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Uom/uom_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/MaterialDescription/material_description_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/RejectionReason/rejection_reason_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/PreviousLoadDetails/previous_load_details_routes.php'));

            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Status/status_routes.php'));
            // ------------------------------------(End)-------------------------------

            // -----------------------Added By Saravana sai------------(Start)--------------------------------
            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Shed/shed_routes.php'));
            // ------------------------------------(End)-------------------------------

            // -----------------------Added By Saravana sai------------(Start)--------------------------------
            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/Vendor/vendor_routes.php'));
            // ------------------------------------(End)-------------------------------

            // -----------------------Added By Saravana sai------------(Start)--------------------------------
            Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/v1/User/user_routes.php'));
            // ------------------------------------(End)-------------------------------

             // -----------------------Added By Saravana sai------------(Start)--------------------------------
             Route::prefix('api/v1/')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/v1/ParkingYardGate/parking_yard_gate_routes.php'));
            // ------------------------------------(End)-------------------------------

            // -----------------------Added By Saravana sai------------(Start)--------------------------------
            Route::prefix('api/v1/')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/v1/DefectType/defect_type_routes.php'));
           // ------------------------------------(End)-------------------------------

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
