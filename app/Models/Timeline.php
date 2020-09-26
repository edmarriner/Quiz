<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Timeline extends Model
{
    protected $fillable = ['related_type', 'related_id', 'message'];

    /** Relationships */
    public function related(): MorphTo {
        return $this->morphTo();
    }

    public function transition(): BelongsTo {
        return $this->belongsTo(TimelineTransition::class);
    }

    public function message(): BelongsTo {
        return $this->belongsTo(TimelineMessage::class);
    }

    /** Timeline entries */


}
