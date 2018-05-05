<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturelines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_description')->nullable();
            $table->integer('quantity');
            $table->float('price');
            $table->date('due_date')->nullable();
            $table->float('tax')->nullable();
            $table->integer('facture_id')->unsigned();
            $table->foreign('facture_id')->references('id')->on('factures');
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
        Schema::dropIfExists('facturelines');
    }
}
