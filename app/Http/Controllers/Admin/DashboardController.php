<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Device;
use App\Models\ModelBrand;
use App\Models\Services;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $devices = Device::count();
        $brands = Brand::count();
        $models = ModelBrand::count();
        $services = Services::count();
        return view('admin.dashboard', compact(['devices', 'brands', 'models', 'services']));
    }
}
