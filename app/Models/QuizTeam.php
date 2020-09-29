<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizTeam extends Model
{
    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
