<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizRoundQuestionOptions extends Migration
{
    public function up()
    {
        Schema::create('quiz_round_question_options', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('option', 250);

            $table->bigInteger('quiz_round_question_id')->unsigned();
            $table->timestamps();

            $table->foreign('quiz_round_question_id')
                ->references('id')
                ->on('quiz_round_questions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_round_question_options');
    }
}
