<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function status() {
        $this->belongsTo(QuizStatus::class);
    }

    public function rounds() {
        $this->hasMany(QuizRound::class);
    }

    public function timelines() {
        $this->morphMany(Timeline::class, 'related');
    }
}
