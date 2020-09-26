<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function status(): BelongsTo {
        return $this->belongsTo(QuizStatus::class);
    }

    public function rounds(): HasMany {
        return $this->hasMany(QuizRound::class);
    }

    public function timelines(): MorphMany {
        return $this->morphMany(Timeline::class, 'related');
    }
}
