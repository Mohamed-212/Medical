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
        config(['website.setup' => CompanySetups::get()->keyBy('key')->toArray() ]);
        config(['website.branches' => Branches::get() ]);
        config(['website.devices' => Device::with('getBrands')->get() ]);
        config(['website.brands' => Brand::with('getModels')->get() ]);
        config(['website.services' => Services::get() ]);
    }
}
