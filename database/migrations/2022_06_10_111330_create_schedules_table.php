<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('UUID');
            $table->string('title',50);
            $table->tinyInteger('isAllDay');
            $table->string('start');
            $table->string('end');
            $table->enum('category',['allday','time']);
            $table->string('dueDateClass')->nullable();
            $table->string('color');
            $table->string('bgColor');
            $table->string('dragBgColor');
            $table->string('borderColor');
            $table->string('location');
            $table->tinyInteger('isPrivate');
            $table->integer('calendarId');
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
