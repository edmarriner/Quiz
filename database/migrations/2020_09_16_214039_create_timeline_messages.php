<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelineMessages extends Migration
{
    public function up()
    {
        Schema::create('timeline_messages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('timeline_id')->unsigned();

            $table->string('label', 250);
            $table->string('message', 250);

            $table->timestamps();

            $table->foreign('timeline_id', 'fk_timeline_message_timeline_id')
                ->references('id')
                ->on('timelines');
        });
    }

    public function down()
    {
        Schema::dropIfExists('timeline_messages');
    }
}
