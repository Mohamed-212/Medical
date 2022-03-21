<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanySetups extends Model
{

    protected $table = 'company_setups';
    protected $fillable = [
        'key', 'value'
    ];

    public $validation_rules = [
        'about_us_ar' => 'required',
        'about_us_en' => 'required',
        'address_ar' => 'required',
        'address_en' => 'required',
        'email' => 'required|email',
        'telephone' => 'required|regex:/^[0-9]+$/',
        'mobile' => 'required|regex:/^[0-9]+$/',
        'facebook' => 'required|url',
        'twitter' => 'required|url',
    ];
}
