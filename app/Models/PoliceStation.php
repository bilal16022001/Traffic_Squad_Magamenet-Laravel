<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    protected $table = "policeStations";
    use HasFactory;
    protected $guarded = [];

    public function Police()
    {
        return $this->belongsToMany("\App\Models\TrafficPolice");
    }
}
