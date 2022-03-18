<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{

    protected $table = 'branches';
    protected $fillable = [
        'name_ar', 'name_en', 'name', 'address', 'telephone', 'mobile', 'email'
    ];
    protected $appends = [
      'name'
    ];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar')
            return $this->attributes['name_ar'];
        else
            return $this->attributes['name_en'];
    }
}
