<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    protected $table = 'devices';
    protected $fillable = [
        'name_ar', 'name_en', 'name'
    ];
    protected $appends = [
      'name'
    ];

    public $validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required'
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }

    public function getBrands()
    {
        return $this->hasMany(Brand::class, 'device_id', 'id');
    }
}
