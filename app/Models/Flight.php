<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        "flight_number",
        "destination",
        "launch_date",
        "seats_available",
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
