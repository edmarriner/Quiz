<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = ['related_type', 'related_id', 'message'];

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
