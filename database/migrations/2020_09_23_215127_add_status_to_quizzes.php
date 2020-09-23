<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToQuizzes extends Migration
{
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->bigInteger('quiz_status_id')->unsigned();
            $table->foreign('quiz_status_id', 'fk_quizzes_status')
                ->references('id')
                ->on('quiz_statuses');
        });
    }

    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign('fk_quizzes_status');
            $table->dropColumn('quiz_status_id');
        });
    }
}
