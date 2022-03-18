<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partners extends Model
{

    protected $table = 'partners';
    protected $fillable = [
        'image', 'image_path', 'name_ar', 'name_en', 'name'
    ];
    protected $appends = [
      'image_path', 'name'
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }

    public function getImagePathAttribute()
    {
        return asset(Storage::url('public/models/' . $this->attributes['image']));
    }


}
