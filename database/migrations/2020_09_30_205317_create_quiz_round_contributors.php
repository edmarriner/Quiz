<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizRoundContributors extends Migration
{
    public function up()
    {
        Schema::create('quiz_round_contributors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('quiz_round_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('quiz_round_id', 'quiz_round_contributors_round_id')
                ->references('id')
                ->on('quiz_rounds');

            $table->foreign('user_id', 'quiz_round_contributors_user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_round_contributors');
    }
}
