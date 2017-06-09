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
            $table->integer('mlines');
            $table->integer('slines');
            $table->date('date');
            $table->integer('line');
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
