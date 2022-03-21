<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    protected $table = 'services';
    protected $fillable = [
        'name_ar', 'name_en', 'description_ar', 'description_en', 'name', 'description'
    ];
    protected $appends = [
      'name', 'description'
    ];

    public $validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'description_ar' => 'required',
        'description_en' => 'required',
        'images' => 'required',
        'images.*' => 'required|mimes:jpeg,jpg,png',
    ];

    public $edit_validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'description_ar' => 'required',
        'description_en' => 'required',
        'images' => 'nullable',
        'images.*' => 'nullable|mimes:jpeg,jpg,png',
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['description_ar'];
        else
            return $this->attributes['description_en'];
    }

    public function getImages()
    {
        return $this->hasMany(ServiceImages::class, 'service_id', 'id');
    }
}
