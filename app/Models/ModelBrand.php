<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBrand extends Model
{

    protected $table = 'models';
    protected $fillable = [
        'name_ar', 'name_en', 'description_ar', 'description_en', 'name', 'description', 'brand_id'
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
        'brand_id' => 'required|exists:brands,id'
    ];

    public $edit_validation_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'description_ar' => 'required',
        'description_en' => 'required',
        'images' => 'nullable',
        'images.*' => 'nullable|mimes:jpeg,jpg,png',
        'brand_id' => 'required|exists:brands,id'
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
        return $this->hasMany(ModelImages::class, 'model_id', 'id');
    }

    public function getBrand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
