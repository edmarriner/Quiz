<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineMessage extends Model
{

    protected $fillable = ['timeline_id', 'label', 'message'];
}
