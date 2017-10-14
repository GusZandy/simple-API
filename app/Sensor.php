<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $fillable = [
      'temperature',
      'humidity',
  ];

  public function device() {

      return  $this->belongsTo('App\Device', 'device_id', 'device_id');
  }

}
