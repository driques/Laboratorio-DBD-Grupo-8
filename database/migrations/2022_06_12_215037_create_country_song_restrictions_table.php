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
        Schema::create('country_song_restrictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_song')->nullable();
            $table->foreign('id_song')->references('id')->on('songs');
            $table->unsignedBigInteger('id_country')->nullable();
            $table->foreign('id_country')->references('id')->on('countries');
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
        Schema::dropIfExists('country_song_restrictions');
    }
};
