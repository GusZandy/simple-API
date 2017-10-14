<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->string('device_id')->primary();
            $table->string('device_name');
            $table->string('device_imei')->nullable();
            $table->string('device_phone_number')->nullable();
            $table->float('device_input_voltage')->nullable();
            $table->integer('device_network_signal')->nullable();
            $table->string('device_latitude')->nullable();
            $table->string('device_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
