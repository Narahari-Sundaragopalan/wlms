<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('empid')-> unique();
        $table->string('empname');
        $table->string('positiontype');
        $table->string('experience');
        $table->integer('rating');
        $table->string('language');
        $table->string('skill');
        $table->string('skill1');
        $table->string('skill2');
        $table->string('skill3');
        $table->string('skill4');
        $table->string('skill5');
        $table->string('skill6');
        $table->string('skill7');
        $table->string('skill8');
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
        Schema::drop('employees');
    }
}
