<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGamesForeign extends Migration
{
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('games_quiz_id_foreign');
        });
    }

    public function down()
    {

    }
}
