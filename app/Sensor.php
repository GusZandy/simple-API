<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $fillable = [
      'device_id', 'temperature', 'humidity',
  ];
}
