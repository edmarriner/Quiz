<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelineTransition extends Migration
{
    public function up()
    {
        Schema::create('timeline_transitions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('timeline_id')->unsigned();

            $table->string('from', 250);
            $table->string('to', 250);
            $table->timestamps();

            $table->foreign('timeline_id', 'fk_timeline_transition_timeline_id')
                ->references('id')
                ->on('timelines');
        });
    }

    public function down()
    {
        Schema::dropIfExists('timeline_transitions');
    }
}
