<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Offense extends Authenticatable
{

    protected $table = 'Offenses';
    public $timestamps = true;
    protected $guarded = [];
    protected $guard = "offense";
}
