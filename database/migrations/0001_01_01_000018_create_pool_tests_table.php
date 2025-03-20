<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolTestsTable extends Migration
{
    public function up()
    {
        Schema::create('pool_tests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->unsignedBigInteger('pool_id');
            $table->foreign('pool_id')->references('id')->on('pool_list');
            $table->decimal('dpd1', 5, 2);
            $table->decimal('dpd3', 5, 2);
            $table->decimal('ccl', 5, 2)->virtualAs('dpd3 - dpd1');
            $table->decimal('ph', 5, 2);
            $table->foreignUlid('user_id')->constrained();
            $table->string('sample_location');
            $table->string('status');
            $table->string('action_taken')->default('none');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pool_tests');
    }
}