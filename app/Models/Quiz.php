<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = ['name'];

    public function rounds() {
        $this->hasMany(QuizRound::class);
    }

    public function timelines() {
        $this->morphMany(Timeline::class, 'related');
    }
}
