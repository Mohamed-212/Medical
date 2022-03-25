<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Services;

class ServicesController extends Controller
{
    public function show($id)
    {
        $services = Services::get();
        $service = Services::with('getImages')->where('id', $id)->first();
        return view('website.service', compact(['service', 'services']));
    }
}
