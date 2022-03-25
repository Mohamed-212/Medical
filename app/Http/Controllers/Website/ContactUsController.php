<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('website.contactUs');
    }
}
