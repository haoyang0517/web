<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Activity;
use App\Observers\RecurrenceObserver;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Activity::observe(RecurrenceObserver::class);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
