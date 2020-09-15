<?php


namespace App\Services;


use App\Models\Timeline;
use Illuminate\Database\Eloquent\Model;

class TimelineService
{
    public static function entry(Model $model, $message): TimelineEntry {
        $timeline = Timeline::create([
            'related_type' => get_class($model),
            'related_id' => $model->id,
            'message' => $message
        ]);

        return new TimelineEntry($timeline);
    }
}
