<?php

use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThermalChecksTable extends Migration
{
    public function up()
    {
        Schema::create('thermal_checks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('thermal_suite_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('checked_at');
            $table->enum('status', [
                'occupied_okay',
                'occupied_issue',
                'not_occupied_okay',
                'not_occupied_issue'
            ]);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('thermal_suite_id')
                  ->references('id')
                  ->on('thermal_suites')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thermal_checks');
    }
}