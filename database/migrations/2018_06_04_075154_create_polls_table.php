<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Duration');
            $table->string('Reason');
            $table->bigInteger('Roll_No');
            $table->dateTime('Deadline');
            $table->smallInteger('Yes');
            $table->smallInteger('No');
            $table->enum('Result',array('Yes','No'));
            $table->string('voted');
            $table->enum('Status',array('Alive','Dead'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
