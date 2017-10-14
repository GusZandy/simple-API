<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  protected $primaryKey = 'device_id';

  protected $fillable = [
      'device_id',
      'device_name',
      'device_imei',
      'device_phone_number',
      'device_input_voltage',
      'device_latitude',
      'device_longitude',
  ];

  public function sensor() {

    return $this->hasMany('App\Sensor', 'device_id', 'device_id');
  }
}
