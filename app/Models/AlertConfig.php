<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertConfig extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'alert_type',
        'name',
        'company',
        'contact',
        'alert_msg',
    ];

}
