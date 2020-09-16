<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineTransition extends Model
{
    protected $fillable = ['label', 'from', 'to'];
}
