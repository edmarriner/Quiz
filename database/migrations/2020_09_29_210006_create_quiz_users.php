<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizUsers extends Migration
{
    public function up()
    {
        Schema::create('quiz_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('admin')->default(0);
            $table->bigInteger('quiz_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->timestamps();

            $table->foreign('quiz_id')
                ->references('id')
                ->on('quizzes');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_users');
    }
}
