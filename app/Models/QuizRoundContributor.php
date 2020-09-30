<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizRoundContributor extends Model
{

    public function round(): BelongsTo {
        return $this->belongsTo(QuizRound::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
