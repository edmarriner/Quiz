<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTeams extends Migration
{
    public function up()
    {
        Schema::create('game_teams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->bigInteger('game_id')->unsigned();

            $table->timestamps();

            $table->foreign('game_id')
                ->references('id')
                ->on('games');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_teams');
    }
}
