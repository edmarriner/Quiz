<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizRoundQuestion extends Model
{
    public function round(): BelongsTo {
        return $this->belongsTo(QuizRound::class);
    }

    public function options(): HasMany {
        return $this->hasMany(QuizRoundQuestionOption::class);
    }
}
