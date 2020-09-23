<?php

use App\Models\QuizStatus;
use Illuminate\Database\Migrations\Migration;

class DefinedQuizStatuses extends Migration
{
    public function up()
    {
        QuizStatus::insert([
            [ 'name' => 'Draft', 'code' => 'DRAFT' ],
            [ 'name' => 'Active', 'code' => 'ACTIVE' ],
            [ 'name' => 'Void', 'code' => 'VOID' ],
        ]);
    }

    public function down()
    {

    }
}
