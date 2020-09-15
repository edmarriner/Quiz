<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizRoundQuestions extends Migration
{
    public function up()
    {
        Schema::create('quiz_round_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('quiz_round_id')->unsigned();
            $table->string('question', 250);

            $table->timestamps();

            $table->foreign('quiz_round_id', 'fk_quiz_round_question_quiz_round_id')
                ->references('id')
                ->on('quiz_rounds');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_round_questions');
    }
}
