<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;

class QuizRound extends Model
{
    public function questions() {
        $this->hasMany(QuizRoundQuestion::class);
    }

    public function quiz(){
        $this->belongsTo(Quiz::class);
    }
}
