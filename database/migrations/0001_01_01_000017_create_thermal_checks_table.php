<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('thermal_checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thermal_area_id');
            $table->enum('status', ['Occupied - Okay', 'Empty - Okay', 'Issue Spotted', 'N/A (Closed)']);
            $table->dateTime('time_checked');
            $table->unsignedBigInteger('user_id');
            $table->text('issue_description')->nullable();
            $table->timestamps();

            $table->foreign('thermal_area_id')->references('id')->on('thermal_areas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thermal_checks');
    }
};