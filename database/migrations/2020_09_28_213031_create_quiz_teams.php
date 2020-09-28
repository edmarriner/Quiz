<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTeams extends Migration
{
    public function up()
    {
        Schema::create('quiz_teams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->bigInteger('quiz_id')->unsigned();

            $table->timestamps();

            $table->foreign('quiz_id')
                ->references('id')
                ->on('games');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_teams');
    }
}
