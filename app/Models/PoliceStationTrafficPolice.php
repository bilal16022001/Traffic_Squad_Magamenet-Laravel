<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStationTrafficPolice  extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function stations()
    {
        return $this->belongsTo("\App\Models\PoliceStation", "police_station_id");
    }

    public function polices()
    {
        return $this->belongsTo("\App\Models\TrafficPolice", "traffic_police_id");
    }
}
