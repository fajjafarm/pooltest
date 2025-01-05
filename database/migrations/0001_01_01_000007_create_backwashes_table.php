<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackwashesTable extends Migration
{
    public function up()
    {
        Schema::create('backwashes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pool_id');
            $table->decimal('pump1_before_pressure', 5, 2)->nullable();
            $table->decimal('pump1_after_pressure', 5, 2)->nullable();
            $table->boolean('basket1_cleaned')->default(false);
            $table->decimal('pump2_before_pressure', 5, 2)->nullable();
            $table->decimal('pump2_after_pressure', 5, 2)->nullable();
            $table->boolean('basket2_cleaned')->default(false);
            $table->decimal('pump3_before_pressure', 5, 2)->nullable();
            $table->decimal('pump3_after_pressure', 5, 2)->nullable();
            $table->boolean('basket3_cleaned')->default(false);
            $table->string('reason_for_backwash');
            $table->text('issues')->nullable();
            $table->string('performed_by');
            $table->timestamps();

            $table->foreign('pool_id')->references('id')->on('pools')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('backwashes');
    }
}