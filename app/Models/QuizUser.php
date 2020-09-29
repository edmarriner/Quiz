<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizUser extends Model
{
    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function team(): BelongsTo {
        return $this->belongsTo(QuizTeam::class);
    }
}
