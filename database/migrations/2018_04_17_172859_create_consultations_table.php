<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('cons_id');
            $table->integer('cons_patient_id')->unsigned();
            $table->float('tarif')->unsigned()->default(0);
            $table->integer('cons_user_id')->unsigned();
            $table->longText('details_consultation')->nullable();
            $table->string('titre')->nullable();
            $table->foreign('cons_user_id')->references('id')->on('users');
            $table->foreign('cons_patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('consultations');
    }
}
