<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $table = 'app_settings';

    protected $fillable = [
        'app_name',
        'app_logo',
        'app_email',
        'app_phone',
        'app_address',
        'app_description',
        'is_maintenance',
        'maintenance_message'
    ];

    protected $casts = [
        'app_name' => 'string',
        'app_email' => 'string',
        'is_maintenance' => 'boolean',
        'maintenance_message' => 'string'
    ];
}
