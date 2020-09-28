<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTeamUsers extends Migration
{
    public function up()
    {
        Schema::create('game_team_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('game_team_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->timestamps();

            $table->foreign('game_team_id', 'fk_game_team_users_game_team_id')
                ->references('id')
                ->on('game_teams');

            $table->foreign('user_id', 'fk_game_team_users_user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_team_users');
    }
}
