<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceImages extends Model
{

    protected $table = 'service_images';
    protected $fillable = [
        'service_id', 'image', 'image_path'
    ];
    protected $appends = [
      'image_path'
    ];

    public function getImagePathAttribute()
    {
        return asset(Storage::url('public/services/' . $this->attributes['service_id'] . '/' . $this->attributes['image']));
    }


}
