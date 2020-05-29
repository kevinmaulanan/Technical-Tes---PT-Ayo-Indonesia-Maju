<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('match_date');
            $table->time('match_time');
            $table->unsignedBigInteger('id_host');
            $table->unsignedBigInteger('id_guest');

            $table->foreign('id_host')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guest')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');

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
