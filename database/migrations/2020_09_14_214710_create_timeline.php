<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeline extends Migration
{
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('related_type', 200);
            $table->integer('related_id')->unsigned();
            $table->string('message');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timelines');
    }
}
