<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ModelImages extends Model
{

    protected $table = 'model_images';
    protected $fillable = [
        'model_id', 'image', 'image_path'
    ];
    protected $appends = [
      'image_path'
    ];

    public function getImagePathAttribute()
    {
        return asset(Storage::url('public/models/' . $this->attributes['image']));
    }


}
