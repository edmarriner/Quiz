<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGames extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('quiz_id')->unsigned();

            $table->timestamps();

            $table->foreign('quiz_id')
                ->references('id')
                ->on('quizzes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
