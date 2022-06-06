<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cancion');
            $table->integer('likes');
            $table->integer('reproducciones');
            $table->integer('restriccion_etaria');
            //$table->unsignedBigInteger('songs_id_restriccion_foreign')->nullable(); Falta creacion de restricciones de pais
            //$table->foreign('songs_id_restriccion_foreign')->references('id_pais')->on('restrictions');
            $table->unsignedBigInteger('id_album')->nullable();
            $table->foreign('id_album')->references('id')->on('albums');

            $table->unsignedBigInteger('id_genre')->nullable();
            $table->foreign('id_genre')->references('id')->on('genres');

            $table->unsignedBigInteger('id_artist')->nullable();
            $table->foreign('id_artist')->references('id')->on('users');
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
        Schema::dropIfExists('songs');
    }
};
