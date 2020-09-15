<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    /** Relationships */
    public function related() {
        return $this->morphTo();
    }

    public function transition() {
        return $this->belongsTo(TimelineTransition::class);
    }

    public function message() {
        return $this->belongsTo(TimelineMessage::class);
    }

    /** Timeline entries */


}
