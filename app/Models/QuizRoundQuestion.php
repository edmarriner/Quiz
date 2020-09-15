<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizRoundQuestion extends Model
{
    public function round() {
        $this->belongsTo(QuizRound::class);
    }

    public function options() {
        $this->hasMany(QuizRoundQuestionOption::class);
    }
}
