<?php

use App\Models\CompanySetups;
use App\Models\Branches;
use App\Models\Device;
use App\Models\Services;

return [
    'setup' => CompanySetups::get()->keyBy('key')->toArray(),
    'branches' => Branches::get(),
    'devices' => Device::with('getBrandes')->get(),
    'services' => Services::get(),
];
