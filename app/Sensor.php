<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $fillable = [
      'device_id',
      'temperature',
      'humidity',
  ];

  public function device() {

      return  $this->belongsTo('App\Device', 'device_id', 'device_id');
  }

}
