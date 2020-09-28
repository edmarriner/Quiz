<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGames extends Migration
{
    public function up()
    {
        Schema::drop('games');
    }

    public function down()
    {
    }
}
