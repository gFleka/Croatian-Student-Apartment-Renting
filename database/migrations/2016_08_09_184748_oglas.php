<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Oglas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
         Schema::create('oglas', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned();  
            $table->string('naslov')->unique();
            $table->longText('opis');
            $table->string('regija');
            $table->integer('cijena_mjesec');
            $table->string('photo_url');
            $table->string('smjestaj');
            $table->boolean('soba');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('oglas');
    }
}
