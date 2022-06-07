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
        Schema::create('playlist_groups', function (Blueprint $table) {
            $table->id();
            //Llamo la llave de cancion
            $table->unsignedBigInteger('id_cancion')->nullable();
            $table->foreign('id_cancion')->references('id')->on('songs');
            //Llamo a la llave de playlist
            $table->unsignedBigInteger('id_playlist')->nullable();
            $table->foreign('id_playlist')->references('id')->on('playlists');
            $table->boolean('borrado');
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
        Schema::dropIfExists('playlist_groups');
    }
};
