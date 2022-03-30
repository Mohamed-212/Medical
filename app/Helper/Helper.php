<?php

namespace App\Helper;


use App\Models\Branches;
use App\Models\Brand;
use App\Models\CompanySetups;
use App\Models\Device;
use App\Models\Services;

class Helper
{

    public static function devices()
    {
        return Device::with('getBrands')->get()->toArray();
    }

    public static function branches()
    {
        return Branches::get()->toArray();
    }

    public static function brands()
    {
        return Brand::with('getModels')->get()->toArray();
    }

    public static function setup()
    {
        return CompanySetups::get()->keyBy('key')->toArray();
    }

    public static function services()
    {
        return Services::get()->toArray();
    }

}
