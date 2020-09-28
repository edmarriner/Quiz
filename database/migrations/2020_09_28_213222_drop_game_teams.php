<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGameTeams extends Migration
{
    public function up()
    {
        Schema::drop('game_teams');
    }

    public function down()
    {

    }
}
