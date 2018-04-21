<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->string('prenom')->nullable();
          $table->date('naissance')->nullable();
          $table->string('addresse')->nullable();
          $table->string('telfixe')->nullable();
          $table->string('telmobile')->nullable();
          $table->string('mail')->nullable();
          $table->char('sexe',1)->nullable();
          $table->string('medecintraitant')->nullable();
          $table->string('metier')->nullable();
          $table->text('allergies')->nullable();
          $table->longText('notes')->nullable();
          $table->integer('users_id')->unsigned();
          $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('patients');
    }
}
