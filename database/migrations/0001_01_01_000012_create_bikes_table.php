<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateBikesTable extends Migration
{
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('mountain, hybrid, ebike, or kids');
            $table->string('status')->default('ready for hire')->comment('ready for hire, hired, awaiting check, awaiting maintenance, reserved');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
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
        Schema::dropIfExists('rentals');
    }
}