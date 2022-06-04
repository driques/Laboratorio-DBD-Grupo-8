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
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_playlist');
            $table->integer('likes_playlist')->nullable();
            $table->unsignedBigInteger('playlist_creator')->nullable();
            $table->foreign('playlist_creator')->references('id')->on('users');
            //Esto no se si esta del todo correcto, ya que deberia entregarle un array de ids de canciones
            //pero solo entrego un id.
            $table->unsignedBigInteger('id_song')->nullable();
            $table->foreign('id_song')->references('id')->on('songs');

            

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
        Schema::dropIfExists('playlists');
    }
};
