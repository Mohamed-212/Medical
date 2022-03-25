<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ModelBrand;

class HomeController extends Controller
{
    public function index()
    {
        $models = ModelBrand::get();
        return view('website.home', compact(['models']));
    }
}
