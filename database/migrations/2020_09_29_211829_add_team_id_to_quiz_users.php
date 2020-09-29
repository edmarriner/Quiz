<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamIdToQuizUsers extends Migration
{
    public function up()
    {
        Schema::table('quiz_users', function (Blueprint $table) {
            $table->bigInteger('quiz_team_id')->unsigned();
            $table->foreign('quiz_team_id', 'fk_quiz_users_team_id')
                ->references('id')
                ->on('quiz_teams');
        });
    }

    public function down()
    {
        Schema::table('quiz_users', function (Blueprint $table) {
            $table->dropForeign('fk_quiz_users_team_id');
            $table->dropColumn('quiz_team_id');
        });
    }
}
