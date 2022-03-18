<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanySetups extends Model
{

    protected $table = 'company_setups';
    protected $fillable = [
        'key', 'value'
    ];
}
