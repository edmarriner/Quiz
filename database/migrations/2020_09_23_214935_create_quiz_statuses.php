<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizStatuses extends Migration
{
    public function up()
    {
        Schema::create('quiz_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', '50');
            $table->string('code');

            $table->index('code', 'inx_quiz_statuses_code');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_statuses');
    }
}
