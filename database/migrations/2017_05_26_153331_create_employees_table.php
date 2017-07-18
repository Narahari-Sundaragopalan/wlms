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
        $table->string('empfname');
        $table->string('emplname');
        $table->string('positiontype');
        $table->string('experience');
        $table->string('labeler_rating',5);
        $table->string('stocker_rating',5);
        $table->boolean('english')-> nullable();
        $table->boolean('spanish')-> nullable();
        $table->boolean('other')-> nullable();
        $table->boolean('icer') -> nullable ();
        $table->boolean('labeler') -> nullable ();
        $table->boolean('mezzanine') -> nullable ();
        $table->boolean('stocker') -> nullable ();
        $table->boolean('runner') -> nullable ();
        $table->boolean('qc') -> nullable ();
        $table->boolean('cleaner') -> nullable ();
        $table->boolean('gift_box') -> nullable ();
        $table->string('comment') -> nullable ();
        $table->softDeletes();
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
