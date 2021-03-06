<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBrand extends Model
{

    protected $table = 'models';
    protected $fillable = [
        'modeel', 'brand', 'description_ar', 'description_en', 'name', 'description', 'brand_id', 'availability', 'condition'
    ];
    protected $appends = [
        'name', 'description'
    ];

    public $validation_rules = [
        'modeel' => 'required',
        'brand' => 'required',
        'description_ar' => 'required',
        'description_en' => 'required',
        'condition' => 'required',
        'availability' => 'required',
        'images' => 'required',
        'images.*' => 'required|mimes:jpeg,jpg,png',
        'brand_id' => 'required|exists:brands,id'
    ];

    public $edit_validation_rules = [
        'modeel' => 'required',
        'brand' => 'required',
        'description_ar' => 'required',
        'description_en' => 'required',
        'condition' => 'required',
        'availability' => 'required',
        'images' => 'nullable',
        'images.*' => 'nullable|mimes:jpeg,jpg,png',
        'brand_id' => 'required|exists:brands,id'
    ];

    public function getNameAttribute()
    {
        return $this->attributes['modeel'] . ' ' . $this->attributes['brand'];
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
