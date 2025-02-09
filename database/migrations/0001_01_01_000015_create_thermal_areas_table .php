<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateThermalAreasTable extends Migration
{
    public function up()
    {
        Schema::create('thermal_areas', function (Blueprint $table) {
            $table->ulid('thermal_area_id')->primary();
            $table->unsignedBigInteger('client_id');
            $table->string('thermal_name');
            $table->string('thermal_type');
            $table->decimal('sauna_temp', 8, 2);
            $table->decimal('steamroom_temp', 8, 2);
            $table->decimal('lounger_temp', 8, 2);
            $table->string('check_interval', 10, 2);
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('thermal_areas');
    }
}