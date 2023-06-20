<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TrafficPolice extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = "trafficPolices";
    protected $guarded = [];


    public function station()
    {
        return $this->belongsToMany('App\Models\PoliceStation');
    }
}
