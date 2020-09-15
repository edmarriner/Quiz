<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizRound extends Migration
{
    public function up()
    {
        Schema::create('quiz_rounds', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('quiz_id')->unsigned();
            $table->string('name');
            $table->integer('order');

            $table->timestamps();

            $table->foreign('quiz_id', 'fk_quiz_round_quiz_id')
                ->references('id')
                ->on('quizzes');

        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_rounds');
    }
}
