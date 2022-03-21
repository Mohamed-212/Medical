<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{

    protected $table = 'branches';
    protected $fillable = [
        'name_ar', 'name_en', 'name', 'address_ar', 'address_en', 'address', 'telephone', 'mobile', 'email'
    ];
    protected $appends = [
      'name'
    ];

    public $validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'address_ar' => 'required',
        'address_en' => 'required',
        'email' => 'nullable|email',
        'telephone' => 'nullable|regex:/^[0-9]+$/',
        'mobile' => 'nullable|regex:/^[0-9]+$/',
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }

    public function getAddressAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['address_ar'];
        else
            return $this->attributes['address_en'];
    }
}
