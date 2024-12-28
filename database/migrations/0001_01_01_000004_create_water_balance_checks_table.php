<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterBalanceTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_balance_tests', function (Blueprint $table) {
            $table->id(); // This creates the 'id' field as the primary key
            $table->float('alkalinity');
            $table->float('calcium_hardness');
            $table->float('ph');
            $table->unsignedBigInteger('pool_id');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Assuming you have a pools table where 'id' is the primary key
            $table->foreign('pool_id')->references('id')->on('pools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_balance_tests');
    }
}