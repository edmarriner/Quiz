<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGameTeamUsers extends Migration
{
    public function up()
    {
        Schema::drop('game_team_users');
    }

    public function down()
    {

    }
}
