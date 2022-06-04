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
        Schema::create('follow_artists', function (Blueprint $table) {
            $table->id();
            //Llave foranea para el usuario
            $table->unsignedBigInteger('follower')->nullable();
            $table->foreign('follower')->references('id')->on('users');
            //Llave foranea para el artista
            $table->unsignedBigInteger('artist')->nullable();
            $table->foreign('artist')->references('id')->on('artists');
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
        Schema::dropIfExists('follow_artists');
    }
};
