<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->integer('eve_patient_id')->unsigned();
            $table->integer('eve_user_id')->nullable()->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreign('eve_user_id')->references('id')->on('users');
            $table->foreign('eve_patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('events');
    }
}
