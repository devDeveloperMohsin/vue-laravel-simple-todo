<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address', 'device',
        'platform', 'platform_version',
        'browser', 'browser_version',
        'is_mobile', 'url',
        'method', 'response_time',
        'request_time',
    ];
}
