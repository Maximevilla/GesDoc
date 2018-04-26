<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ord_patient_id')->unsigned();
            $table->integer('ord_user_id')->unsigned();
            $table->integer('ord_consult_id')->unsigned();
            $table->string('titre')->nullable();
            $table->longText('details_ordonnance')->nullable();
            $table->foreign('ord_user_id')->references('id')->on('docteurs');
            $table->foreign('ord_patient_id')->references('id')->on('patients');
            $table->foreign('ord_consult_id')->references('id')->on('consultations');
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
        Schema::dropIfExists('ordonnances');
    }
}
