<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSensor extends Model
{
    protected $fillable = [
      'deviceID', 'Temperature', 'Humidity',
    ];
}
