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

            $table->integer('timeline_id')->unsigned();

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
