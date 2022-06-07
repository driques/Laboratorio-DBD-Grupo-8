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
        Schema::create('like_songs', function (Blueprint $table) {
            $table->id();
            //Referencia a la cancion
            $table->unsignedBigInteger('id_song')->nullable();
            $table->foreign('id_song')->references('id')->on('songs');
            //Referencia al usuario que gusta la cancion
            $table->unsignedBigInteger('user_like')->nullable();
            $table->foreign('user_like')->references('id')->on('users');
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
        Schema::dropIfExists('like_songs');
    }
};
