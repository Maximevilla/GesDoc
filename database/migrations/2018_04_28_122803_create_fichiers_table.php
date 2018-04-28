<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultation_id')->unsigned();
            $table->string('fichier1url')->nullable();
            $table->string('fichier1titre')->nullable();
            $table->string('fichier2url')->nullable();
            $table->string('fichier2titre')->nullable();
            $table->string('fichier3url')->nullable();
            $table->string('fichier3titre')->nullable();
            $table->string('fichier4url')->nullable();
            $table->string('fichier4titre')->nullable();
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
        Schema::dropIfExists('fichiers');
    }
}
