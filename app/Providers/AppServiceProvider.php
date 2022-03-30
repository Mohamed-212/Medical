<?php

namespace App\Providers;

use App\Models\Branches;
use App\Models\Brand;
use App\Models\CompanySetups;
use App\Models\Device;
use App\Models\Services;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
