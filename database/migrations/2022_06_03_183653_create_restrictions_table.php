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
        Schema::create('restrictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pais')->nullable();
            $table->foreign('id_pais')->references('id')->on('countries');
            $table->unsignedBigInteger('id_cancion')->nullable();
            $table->foreign('id_cancion')->references('id')->on('songs');
        
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
        Schema::dropIfExists('restrictions');
    }
};
