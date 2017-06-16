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
        $table->string('rating',5);
        $table->string('srating',5);
        $table->string('language');
        $table->string('skill') -> nullable ();
        $table->string('skill1') -> nullable ();
        $table->string('skill2') -> nullable ();
        $table->string('skill3') -> nullable ();
        $table->string('skill4') -> nullable ();
        $table->string('skill5') -> nullable ();
        $table->string('skill6') -> nullable ();
        $table->string('skill7') -> nullable ();
        $table->string('skill8') -> nullable ();
        $table->string('comment') -> nullable ();
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
