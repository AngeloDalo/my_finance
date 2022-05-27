<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gruppo_id')->nullable();
            $table->foreign('gruppo_id')->references('id')->on('groups')->onDelete('set null');
            $table->unsignedBigInteger('codice_id')->nullable();
            $table->foreign('codice_id')->references('id')->on('codes')->onDelete('set null');
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('types')->onDelete('set null');
            $table->float('totale');
            $table->date("data");
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
        Schema::dropIfExists('transactions');
    }
}
