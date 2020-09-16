<?php


namespace App\Classes;


use App\Models\Timeline;
use Illuminate\Support\Collection;

class TimelineEntry
{

    private Timeline $timeline;
    private Collection $messages;
    private Collection $transitions;

    public function __construct(Timeline $timeline)
    {
        $this->timeline = $timeline;

        $this->transitions = collect();
        $this->messages = collect();
    }

    public function withTransition(string $label, $from, $to): self {
        $transitionEntry = $this->timeline->transition()->create([
            'timeline_id' => $this->timeline->id,
            'label' => $label,
            'from' => $from,
            'to' => $to
        ]);

        $this->transitions->add($transitionEntry);

        return $this;
    }

    public function withMessage(string $label, string $message): self {
        $messageEntry = $this->timeline->message()->create([
            'timeline_id' => $this->timeline->id,
            'label' => $label,
            'message' => $message
        ]);

        $this->messages->add($messageEntry);

        return $this;
    }

    public function getTimelineEntry() {
        return $this->timeline;
    }
}
