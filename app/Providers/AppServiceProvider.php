<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /*this macro is added by saravana sai
        */
        Http::macro('nagasap', function () {
            return Http::withHeaders([
                'x-csrf-token' => 'fetch'
            ])->withBasicAuth(env('SAP_USERNAME'),env('SAP_PASSWORD'))
            ->baseUrl(env('SAP_HOST').':'.env('SAP_PORT'));
        });


         /*this macro is added by saravana sai
        */
        Http::macro('nagasappost', function () {
            return Http::withBasicAuth(env('SAP_USERNAME'),env('SAP_PASSWORD'))
            ->baseUrl(env('SAP_HOST').':'.env('SAP_PORT'));
        });



    }
}
