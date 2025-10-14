<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LunarMissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_name',
        'launch_date',
        'launch_name',
        'latitude',
        'longitude',
        'hours',
        'minutes',
        '',
    ];

}
