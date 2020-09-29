<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizRoundQuestionOption extends Model
{
    public function question(): BelongsTo {
        return $this->belongsTo(QuizRoundQuestion::class);
    }
}
