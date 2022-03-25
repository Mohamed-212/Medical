<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('website.aboutUs');
    }
}
