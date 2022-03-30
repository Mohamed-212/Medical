<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MailSettings extends Model
{

    protected $table = 'mail_settings';
    protected $fillable = [
        'host', 'port', 'encryption', 'username', 'password', 'to'
    ];

    public $validation_mail = [
        'port' => 'required',
        'host' => 'required',
        'encryption' => 'required',
        'username' => 'required|email',
        'password' => 'required',
        'to' => 'required|array|min:1',
        'to.*' => 'required|email',
    ];
}
