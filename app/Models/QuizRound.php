<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizRound extends Model
{
    protected $fillable = [ 'name' ];

    public function questions(): HasMany {
        return $this->hasMany(QuizRoundQuestion::class);
    }

    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class);
    }
}
