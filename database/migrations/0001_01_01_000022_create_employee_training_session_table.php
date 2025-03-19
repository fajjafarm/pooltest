<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTrainingSessionTable extends Migration
{
    public function up()
    {
        Schema::create('employee_training_session', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('employee_id')->constrained()->onDelete('cascade');
            $table->foreignUlid('training_session_id')->constrained()->onDelete('cascade');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_training_session');
    }
}