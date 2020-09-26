<?php


namespace App\Services;


use App\Models\Quiz;
use App\Models\QuizRound;

class QuizRoundService
{

    /**
     * @var TimelineService
     */
    private TimelineService $timelineService;

    public function __construct(TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }

    public function createQuizRound(Quiz $quiz, string $name) {

        $round = QuizRound::make([
            'name' => $name,
        ]);

        // Assign the next highest order
        $round->order = $this->calculateNextRoundOrder($quiz);

        $quiz->rounds()->save($round);

        $this->timelineService->entry($quiz, 'New quiz round created')
            ->withMessage('Name', $name);

        return $round;
    }

    private function calculateNextRoundOrder(Quiz $quiz):int {

        $highest = QuizRound::query()
            ->where('quiz_id', $quiz->id)
            ->select('order')
            ->orderBy('order')
            ->first();

        return $highest->order ?? 1;
    }
}
