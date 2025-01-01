<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('action_logs', function (Blueprint $table) {
        $table->id();
        $table->string('action_type');
        $table->string('escalation')->nullable();
        $table->text('comments')->nullable();
        $table->string('actioned_by');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('action_logs');
}
}