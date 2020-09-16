<?php


namespace App\Services;


use App\Classes\TimelineEntry;
use App\Models\Timeline;
use Exception;
use Illuminate\Database\Eloquent\Model;

class TimelineService
{
    public static function entry(Model $model, string $message): TimelineEntry {

        if($model->exists === false) {
            throw new Exception('Can not create timeline entry for a unsaved model');
        }

        $timeline = Timeline::create([
            'related_type' => get_class($model),
            'related_id' => $model->getAttribute('id'),
            'message' => $message,
        ]);

        return new TimelineEntry($timeline);
    }
}
