<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class CreateBikeRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('bike_rentals', function (Blueprint $table) {
            $table->ulid();
            $table->unsignedBigInteger('bike_id');
            $table->string('order_number');
            $table->string('name');
            $table->integer('duration'); // Duration in hours or days, specify in your application
            $table->boolean('helmet_borrowed')->default(false);
            $table->boolean('lock_borrowed')->default(false);
            $table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bike_rentals');
    }
}