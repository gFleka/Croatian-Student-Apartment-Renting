<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOglasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oglas', function (Blueprint $table) {
            $table->bigIncrements('oglas_id');
            $table->foreign('oglas_id')->references('id')->on('korisniks');
            $table->string('naslov')->unique();
            $table->string('tekst');
            $table->string('regija');
            $table->integer('cijena_mjesec');
            $table->string('photo_url');
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
        Schema::drop('oglas');
    }
}
