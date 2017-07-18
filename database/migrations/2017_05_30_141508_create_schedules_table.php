<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('coolers_shipped')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->json('schedule');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *s
     * @return void
     */
    public function down()
    {
        Schema::drop('schedules');
    }
}
