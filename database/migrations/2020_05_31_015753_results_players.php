<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultsPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('gol_time');
            $table->unsignedBigInteger('id_player');
            $table->unsignedBigInteger('id_team');
            $table->unsignedBigInteger('id_result');
            
            $table->foreign('id_player')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_result')->references('id')->on('results')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
