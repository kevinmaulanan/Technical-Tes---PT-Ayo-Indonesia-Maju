<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Player extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('player_name')->unique();
            $table->integer('player_tall');
            $table->integer('player_weight');
            $table->integer('player_nomor');
            $table->unsignedBigInteger('id_position');
            $table->unsignedBigInteger('id_team');
           

            $table->foreign('id_position')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');

            
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
