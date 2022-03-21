<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = 'brands';
    protected $fillable = [
        'name_ar', 'name_en', 'name', 'device_id'
    ];
    protected $appends = [
      'name'
    ];

    public $validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'device_id' => 'required|exists:devices,id'
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }

    public function getModels()
    {
        return $this->hasMany(ModelBrand::class, 'brand_id', 'id');
    }

    public function getDevice()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }
}
