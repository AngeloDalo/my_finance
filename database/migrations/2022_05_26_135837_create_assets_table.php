<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gruppo_id')->nullable();
            $table->foreign('gruppo_id')->references('id')->on('groups')->onDelete('set null');
            $table->unsignedBigInteger('codice_id')->nullable();
            $table->foreign('codice_id')->references('id')->on('codes')->onDelete('set null');
            $table->string('nome');
            $table->float('ammontare');
            $table->float('prezzo_singolo');
            $table->float('apy');
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
        Schema::dropIfExists('assets');
    }
}
